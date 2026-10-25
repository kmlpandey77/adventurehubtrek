<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	public static function main()
	{
		$i = 1;
		$menu = [];
		$pages = Page::whereIn('position', array('1', '3'))
			// ->where('id', '<>', 1)
			->orderby('menu_order')
			// ->orderby(\DB::raw('FIELD(id,7,6)'))
			->active()
			->get();
		foreach ($pages as $page) {

			if ($i == 3) {

				$destinations = Destination::active()->get();
				$dest_menu = [];
				foreach ($destinations as $destination) {
					$dest_menu += self::dest_chain($destination);
				}
				$menu += array(
					'destinations' => array(
						'destinations' => 'Destinations',
						'sub' => $dest_menu
					)
				);

				$activities = Activity::where('show_in_menu', 1)->active()->get();
				foreach ($activities as $activity) {
					$menu[$activity->slug] = $activity->menu_title ? $activity->menu_title : $activity->title;
					$regions = $activity->regions;
					$packages = $activity->packages;
					if (count($regions) > 0 || count($packages) > 0) {
						$sub = [];
						if (count($regions) > 0) {
							foreach ($regions as $region) {
								$r_menu = [];
								$sub[$region->slug] = $region->title;
								$r_packages = $region->packages;
								if (count($r_packages) > 0) {
									foreach ($r_packages as $r_package) {
										$r_menu[$r_package->slug] = $r_package->title;
									}
									// $sub['region/' . $region->slug] = $r_menu;
									$sub[$region->slug] = array(
										$region->slug => $region->title,
										'sub' => $r_menu
									);
								}
							}
						}
						if (count($packages) > 0) {
							foreach ($packages as $package) {
								$sub[$package->slug] = $package->title;
							}
						}
						$menu[$activity->slug] = array(
							$activity->slug => $activity->menu_title ? $activity->menu_title : $activity->title,
							'sub' => $sub
						);
					}

					if (
						config('menu.' . $activity->slug) &&
						$new_page = Page::find(config('menu.' . $activity->slug))
					) {
						$child_sub = [];

						if (count($new_page->child) > 0) {
							$r_child = [];
							foreach ($new_page->child as $child) {
								$r_child[$child->slug] = $child->title;
							}
							$child_sub[$new_page->slug] = array(
								$new_page->slug => $new_page->title,
								'sub' => $r_child
							);
						} else {
							$child_sub[$new_page->slug] = $new_page->title;
						}
						if (isset($menu[$activity->slug]['sub'])) {
							$menu[$activity->slug]['sub'] += $child_sub;
						} else {
							$menu[$activity->slug] = array(
								$activity->slug => $activity->title,
								'sub' => $child_sub
							);
						}
					}
				}
			}

			$menu += self::page_child($page);
			$i++;
		}
		// dd($menu);
		return $menu;
	}

	public static function footer_link()
	{
		return Page::whereIn('position', array(2, 3))->orderBY('footer_order')->active()->get();
	}

	public static function page_child($page)
	{
		if ($page) {

			$menu[$page->slug] = $page->title;
			if ($page->slug == 'hotel-booking') {
				$hotels = \App\City::all();

				$sub = [];
				foreach ($hotels as $hotel) {
					$sub[$hotel->slug] = $hotel->name;
				}
				$menu[$page->slug] = $menu + array('sub' => $sub);
			} else {

				if (count($child = $page->child) > 0) {
					$sub = [];
					foreach ($child as $c) {
						$sub += self::page_child($c);
					}
					$menu[$page->slug] = $menu + array('sub' => $sub);
				}
			}

			return $menu;
		} else {
			return false;
		}
	}

	public static function dest_chain($destination)
	{
		if ($destination) {
			$dest_items[$destination->slug] = $destination->title;

			if (count($activities = $destination->activities)) {
				foreach ($activities as $activity) {
					if ($activity->id <> 9) {
						$act_items[$activity->slug] = $activity->title;
						if (count($regions = $activity->regions)) {
							$reg_items = [];

							foreach ($regions as $region) {
								$reg_items[$region->slug] = $region->title;
								if (count($reg_packages = $region->packages)) {
									$reg_pack_items = [];
									foreach ($reg_packages as $reg_package) {
										$reg_pack_items[$reg_package->slug] = $reg_package->title . ' - ' . $reg_package->days();
									}
									$reg_items[$region->slug] = $reg_items + array('sub' => $reg_pack_items);
								}
							}

							$act_items[$activity->slug] = $act_items + array('sub' => $reg_items);
						}

						if (count($packages = $activity->packages)) {
							$pack_items = [];
							foreach ($packages as $package) {
								$pack_items[$package->slug] = $package->title . ' - ' . $package->days();
							}
							if (isset($act_items[$activity->slug]['sub'])) {
								$act_items[$activity->slug]['sub'] += $pack_items;
							} else {
								$act_items[$activity->slug] = $act_items + array('sub' => $pack_items);
							}
						}
					}
				}
				$dest_items[$destination->slug] = $dest_items + array('sub' => $act_items);
			}

			return $dest_items;
		} else {
			return false;
		}
	}

	public static function html($menus, $i = 0)
	{
		$i++;
		$html = null;
		foreach ($menus as $link => $menu) {
			if (is_array($menu)) {
				// dd($menu);
				$html .= '<li class="' . ($i == 1 ? 'nav-item ' : null) . 'dropdown">';
				$html .= '<a class="' . ($i == 1 ? 'nav-link' : 'dropdown-item') . ' dropdown-toggle" href="' . url($link) . '">' . $menu[$link] . '</a>';
				$html .= '<ul class="dropdown-menu">';
				$html .= self::html($menu['sub'], $i);
				$html .= '</ul>';
				$html .= '</li>';
			} else {
				$html .= '<li class="' . ($i == 1 ? 'nav-item ' : null) . '"><a class="' . ($i == 1 ? 'nav-link' : 'dropdown-item') . '" href="' . url($link) . '">' . $menu . '</a></li>';
			}
		}

		return $html;
	}
}
