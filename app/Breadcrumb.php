<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breadcrumb extends Model
{
	public $value;
	public $breadcrumb;

	public function __construct($value, $page=null)
	{
		$this->value = $value;
		$this->breadcrumb =  '<nav itemscope itemtype="http://schema.org/BreadcrumbList" aria-label="breadcrumb" class="hidden-xs"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="'. url('/') .'">Home</a></li>';
		if($page && $page == 'blog'){
			$this->breadcrumb .= '<li itemprop="itemListElement" itemscope
			itemtype="http://schema.org/ListItem" class="breadcrumb-item"><a itemprop="item"  href="'. url('blogs') .'">Blogs</a></li>';
		}

		if($page && $page == 'news'){
			$this->breadcrumb .= '<li itemprop="itemListElement" itemscope
			itemtype="http://schema.org/ListItem" class="breadcrumb-item"><a itemprop="item"  href="'. url('news') .'">News</a></li>';
		}
		$this->breadcrumb .= $this->generate();
		$this->breadcrumb .= '</ol></nav>';
	}

	public function __toString()
	{
		return $this->breadcrumb;
	}

	public function generate()
	{
		$breadcrumb = '';

		//DESTINATION
		if($this->value->destination){
			$breadcrumb .=  '<li itemprop="itemListElement" itemscope
			itemtype="http://schema.org/ListItem" class="breadcrumb-item"><a itemprop="item"  href="'. url($this->value->destination->slug) .'">'. $this->value->destination->title .'</a></li>';
		}

		//ACTIVITY
		if($this->value->activity){

			if($this->value->activity->destination){//for region
				$breadcrumb .=  '<li itemprop="itemListElement" itemscope
				itemtype="http://schema.org/ListItem" class="breadcrumb-item"><a itemprop="item"  href="'. url($this->value->activity->destination->slug) .'">'. $this->value->activity->destination->title .'</a></li>';
			}
			
			$breadcrumb .=  '<li itemprop="itemListElement" itemscope
			itemtype="http://schema.org/ListItem" class="breadcrumb-item"><a itemprop="item"  href="'. url($this->value->activity->slug) .'">'. $this->value->activity->title .'</a></li>';
		}

		//REGION
		if($this->value->region){
			$breadcrumb .=  '<li itemprop="itemListElement" itemscope
			itemtype="http://schema.org/ListItem" class="breadcrumb-item"><a itemprop="item" href="'. url($this->value->region->slug) .'">'. $this->value->region->title .'</a></li>';
		}

		//PAGE
		$breadcrumb .=  '<li class="breadcrumb-item active">' . $this->value->title . '</li>';

		return $breadcrumb;		
	}

	public static function trip($package)
	{
		$breadcrumb =  '<ol class="breadcrumb">';
		$breadcrumb .=  '<li><a href="'. url('/') .'">Home</a></li>';
		$breadcrumb .=  '<li><a href="'. url($package->activity->destination->slug) .'">'. $package->activity->destination->title .'</a></li>';

		$breadcrumb .=  '<li><a href="'. url($package->activity->slug) .'">'. $package->activity->title .'</a></li>';

		if($package->region){
			$breadcrumb .=  '<li><a href="'. url($package->region->slug) .'">'. $package->region->title .'</a></li>';

		}
		$breadcrumb .=  '<li>' . $package->title . '</li>';

		$breadcrumb .= '</ol>';
		return $breadcrumb;		
	}

	public static function region($region)
	{
		$breadcrumb =  '<ol class="breadcrumb">';
		$breadcrumb .=  '<li><a href="'. url('/') .'">Home</a></li>';
		$breadcrumb .=  '<li><a href="'. url($region->activity->slug) .'">'. $region->activity->title .'</a></li>';

		$breadcrumb .=  '<li>' . $region->title . '</li>';

		$breadcrumb .= '</ol>';
		return $breadcrumb;		
	}

	public static function page($page)
	{
		$breadcrumb =  '<ol class="breadcrumb">';
		$breadcrumb .=  '<li><a href="'. url('/') .'">Home</a></li>';
		$breadcrumb .=  '<li>' . $page->title . '</li>';

		$breadcrumb .= '</ol>';
		return $breadcrumb;		
	}
}
