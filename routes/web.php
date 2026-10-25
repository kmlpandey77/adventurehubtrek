<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')->name('home');
Route::get('/blogs/{blog}/{slug}', 'BlogController@view');
Route::get('/news', 'NewsController@index');

Route::get('/reviews', 'ReviewController@index');



/**
 * routes for admins
 */
Route::get('administrative/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('administrative/login', 'Auth\LoginController@login');
Route::get('administrative/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('administrative/logout', 'Auth\LoginController@logout');

Route::group(['prefix' => 'administrative', 'middleware' => ['auth'], 'namespace' => 'Admin'], function () {
	// Route::get('/', 'DashboardController@dashboard')->name('dashboard');
	Route::get('/', function () {
		return view('admin.dashboard');
	})->name('admin.dashboard');

	Route::get('/cacheclear', function () {
		\Cache::clear();
		return redirect()->back();
	})->name('cacheclear');

	Route::resource('pages', 'PageController');
	Route::post('pages/order', 'PageController@order')->name('pages.order');
	Route::get('pages/showhide/{page}', 'PageController@showhide')->name('pages.showhide');
	Route::resource('destinations', 'DestinationController');
	Route::resource('activities', 'ActivityController');
	Route::get('activities/showhide/{activity}', 'ActivityController@showhide')->name('activities.showhide');
	Route::resource('regions', 'RegionController');
	Route::post('regions/order', 'RegionController@order')->name('regions.order');
	Route::get('regions/showhide/{region}', 'RegionController@showhide')->name('regions.showhide');
	Route::resource('packages', 'PackageController');
	Route::post('packages/order', 'PackageController@order')->name('packages.order');
	Route::post('packages/factdelete', 'PackageController@factdelete')->name('packages.factdelete');
	Route::post('packages/factorder', 'PackageController@factorder')->name('packages.factorder');
	Route::get('packages/showhide/{package}', 'PackageController@showhide')->name('packages.showhide');
	Route::post('packages/viewitinerary/{package}', 'PackageController@viewitinerary')->name('packages.viewitinerary');
	Route::post('packages/itineraryorder', 'PackageController@itineraryorder')->name('packages.itineraryorder');
	Route::get('packages/itinerarydelete/{itinerary}', 'PackageController@itinerarydelete')->name('packages.itinerarydelete');
	Route::resource('blogs', 'BlogController');
	Route::resource('reviews', 'ReviewController');
	Route::resource('teams', 'TeamController');
	Route::post('teams/order', 'TeamController@order')->name('teams.order');
	Route::resource('teamcategories', 'TeamcategoryController');
	Route::post('teamcategories/order', 'TeamcategoryController@order')->name('teamcategories.order');
	Route::resource('socials', 'SocialController');
	Route::resource('associates', 'AssociateController');
	Route::resource('labels', 'LabelController');
	Route::resource('legaldocs', 'LegaldocController');
	Route::resource('redirects', 'RedirectController');
	Route::resource('subscribers', 'SubcriberController');
	Route::resource('news', 'NewsController');

	Route::resource('slides', 'SlideController');
	Route::post('slides/order', 'SlideController@order')->name('slides.order');
	Route::get('slides/showhide/{slide}', 'SlideController@showhide')->name('slides.showhide');
	Route::get('tripslides/create/{trip}', 'TripslideController@create')->name('tripslides.create');
	Route::get('tripslides/{trip}', 'TripslideController@index')->name('tripslides.index');
	Route::post('tripslides/{trip}', 'TripslideController@store')->name('tripslides.store');
	Route::get('tripslides/{slide}/edit', 'TripslideController@edit')->name('tripslides.edit');
	Route::put('tripslides/{slide}', 'TripslideController@update')->name('tripslides.update');
	Route::delete('tripslides/{slide}', 'TripslideController@destroy')->name('tripslides.destroy');

	Route::get('activityslides/create/{trip}', 'ActivityslideController@create')->name('activityslides.create');
	Route::get('activityslides/{trip}', 'ActivityslideController@index')->name('activityslides.index');
	Route::post('activityslides/{trip}', 'ActivityslideController@store')->name('activityslides.store');
	Route::get('activityslides/{slide}/edit', 'ActivityslideController@edit')->name('activityslides.edit');
	Route::put('activityslides/{slide}', 'ActivityslideController@update')->name('activityslides.update');
	Route::delete('activityslides/{slide}', 'ActivityslideController@destroy')->name('activityslides.destroy');

	Route::get('regionslides/create/{trip}', 'RegionslideController@create')->name('regionslides.create');
	Route::get('regionslides/{trip}', 'RegionslideController@index')->name('regionslides.index');
	Route::post('regionslides/{trip}', 'RegionslideController@store')->name('regionslides.store');
	Route::get('regionslides/{slide}/edit', 'RegionslideController@edit')->name('regionslides.edit');
	Route::put('regionslides/{slide}', 'RegionslideController@update')->name('regionslides.update');
	Route::delete('regionslides/{slide}', 'RegionslideController@destroy')->name('regionslides.destroy');

	Route::get('tripdates/create/{trip}', 'TripdateController@create')->name('tripdates.create');
	Route::get('tripdates/{trip}', 'TripdateController@index')->name('tripdates.index');
	Route::post('tripdates/{trip}', 'TripdateController@store')->name('tripdates.store');

	Route::get('tripdates/{date}/edit', 'TripdateController@edit')->name('tripdates.edit');
	Route::put('tripdates/{date}', 'TripdateController@update')->name('tripdates.update');
	Route::delete('tripdates/{date}', 'TripdateController@destroy')->name('tripdates.destroy');

	Route::resource('videos','VideoController');
	Route::resource('albums','AlbumController');
    Route::post('albums/photodelete', 'AlbumController@photodelete')->name('albums.photodelete');
});


$router->group(
	['middlewareGroup' => ['web']],
	function ($router) {
		$router->get(
			'upload/{type}/{size}/{imageName?}',
			[
				'as'   => 'image',
				'uses' => 'ImageController@index',
			]
		);
	}
);

$router = app()->make('router');

$pages = App\Page::all();
foreach ($pages as $page) {
	if ($page->slug == 'legal-documents') {
		$router->get($page->slug, 'PageController@legaldoc');
	} elseif ($page->slug == 'contact') {
		$router->get($page->slug, 'PageController@contact')->name('contact');
		$router->post($page->slug, 'PageController@contact');
	} elseif ($page->slug == 'blogs') {
		$router->get($page->slug, 'BlogController@index');
	} elseif ($page->slug == 'reviews') {
		$router->get($page->slug, 'ReviewController@index');
	} elseif ($page->slug == 'video-gallery') {
		$router->get($page->slug, 'PageController@video');
	}	elseif ($page->slug == 'photo-gallery') {
		$router->get($page->slug, 'PageController@photo');
	} elseif ($page->slug <> '/') {
		$router->get($page->slug, 'PageController@index');
	}
}
Route::get('photo-gallery/{album}', 'PageController@viewphoto')->name('photo-gallery');
$router->get('sitemap.xml', 'PageController@sitemap');

$destinations = App\Destination::all();
foreach ($destinations as $dest) {
	$router->get($dest->slug, 'DestinationController@index');
}

$activities = App\Activity::all();
foreach ($activities as $activity) {
	$router->get($activity->slug, 'ActivityController@index');
}

$regions = App\Region::all();
foreach ($regions as $region) {
	$router->get($region->slug, 'RegionController@index');
}

$packages = App\Package::all();
foreach ($packages as $package) {
	$router->get($package->slug, 'PackageController@index');
}

Route::get('pdf/{slug}', 'PrintController@pdf')->name('pdf');
Route::post('sendinquiry', 'BookingController@inquiry')->name('sendinquiry');
Route::post('customize', 'CustomizeController@index')->name('customize');
Route::get('search', 'SearchController@index')->name('search');

Route::get('booking/{slug}', 'BookingController@index')->name('booking');
Route::post('booking/{slug}', 'BookingController@index');
Route::get('print/{slug}', 'PrintController@index')->name('print');


Route::post('requestcallback', 'BookingController@requestcallback')->name('requestcallback');
Route::post('downloadbrochure', 'BookingController@downloadbrochure')->name('downloadbrochure');
Route::get('searchcategory', 'SearchController@searchcategory')->name('searchcategory');

Route::get('thankyou', 'BookingController@thankyou')->name('thankyou');

Route::post('subscriber', 'BookingController@subscriber')->name('subscriber');
