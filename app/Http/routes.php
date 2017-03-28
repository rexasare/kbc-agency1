<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Authentication routes
Route::get('auth/register', ['uses' => 'Auth\AuthController@getRegister', 'as' => 'register']);
Route::post('auth/register', ['uses' => 'Auth\AuthController@postRegister']);
Route::get('auth/login', ['uses' => 'Auth\AuthController@getLogin', 'as' => 'login']);
Route::post('auth/login', ['uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'logout']);
//Password reset Routes
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

//Admin Routes
Route::group(['middleware' => ['auth', 'admin']], function () {
  Route::get('admin', ['uses' => 'AdminController@getIndex', 'as' => 'admin']);
  Route::get('admin/banner', ['uses' => 'AdminController@getBanner', 'as' => 'banner']);
  Route::post('admin/banner', ['uses' => 'AdminController@postBanner', 'as' => 'banner.store']);
  Route::get('admin/banners/view', ['uses' => 'AdminController@viewBanners', 'as' => 'banners.view']);
  Route::get('admiin/banner/{id}', ['uses' => 'AdminController@showBanner', 'as' => 'banner.show']);
  Route::post('admin/banner/{id}', ['uses' => 'AdminController@updateBanner', 'as' => 'banner.update']);
  Route::post('admin/banner/destroy/{id}', ['uses' => 'AdminController@deleteBanner', 'as' => 'banner.destroy']);
  Route::get('admin/category', ['uses' => 'AdminController@getCat', 'as' => 'cat']);
  Route::post('admin/category', ['uses' => 'AdminController@postCat', 'as' => 'cat.store']);
  Route::get('admin/category/view', ['uses' => 'AdminController@viewCategories', 'as' => 'category.all']);
  Route::get('admin/category/edit/{id}', ['uses' => 'AdminController@editCategory', 'as' => 'cat.edit']);
  Route::post('admin/category/edit/{id}', ['uses' => 'AdminController@updateCategory', 'as' => 'cat.update']);
  Route::get('admin/sub_category', ['uses' => 'AdminController@getSubCat', 'as' => 'sub_cat']);
  Route::post('admin/sub_category', ['uses' => 'AdminController@postSubCat', 'as' => 'sub_cat.store']);
  Route::get('admin/sub_category/view', ['uses' => 'AdminController@viewSubCats', 'as' => 'sub-category.all']);
  Route::get('admin/sub_category/edit/{id}', ['uses' => 'AdminController@editSubCats', 'as' => 'scat.edit']);
  Route::post('admin/sub_category/update/{id}', ['uses' => 'AdminController@updateSubCats', 'as' => 'scat.update']);
  Route::post('admin/sub_category/destroy/{id}', ['uses' => 'AdminController@deleteSubCats', 'as' => 'scat.destroy']);
  Route::get('admin/ads', ['uses' => 'AdminController@getAds', 'as' => 'ads']);
  Route::post('admin/ads', ['uses' => 'AdminController@postAds', 'as' => 'ads.store']);
  Route::get('admin/view-ad', ['uses' => 'AdminController@viewAd', 'as' => 'ads.show']);
  Route::post('admin/view-ad', ['uses' => 'AdminController@postViewAd', 'as' => 'view-ad.store']);
  Route::get('admin/view-results', ['uses' => 'AdminController@getResults', 'as' => 'ads.view-search']);
  Route::get('admin/add-images/{ad}', ['uses' => 'AdminController@getImages', 'as' => 'add-images']);
  Route::post('admin/add-images/{ad}', ['uses' => 'AdminController@postImages', 'as' => 'post-images']);
  Route::get('admin/add-conditions/{id}', ['uses' => 'AdminController@getConditions', 'as' => 'add-conditions']);
  Route::post('admin/add-conditions/{id}', ['uses' => 'AdminController@postConditions', 'as' => 'post-conditions']);
  Route::get('admin/ads/{id}/edit/{sid}/{cid}', ['uses' => 'AdminController@editAd', 'as' => 'ads.edit']);
  Route::post('admin/ads/{id}/update/{sid}/{cid}', ['uses' => 'AdminController@updateAd', 'as' => 'ads.update']);
  Route::get('admin/add-featured-ads', ['uses' => 'AdminController@getFeaturedAds', 'as' => 'ad-features']);
  Route::post('admin/add-featured-ads', ['uses' => 'AdminController@postFeaturedAds', 'as' => 'add-featured']);
  Route::get('admin/view-fad', ['uses' => 'AdminController@viewFAd', 'as' => 'adf-show']);
  Route::post('admin/view-fad', ['uses' => 'AdminController@postViewFAd', 'as' => 'view-fad.store']);
  Route::get('admin/featured-ads/{id}/edit/{sid}/{cid}', ['uses' => 'AdminController@editfAd', 'as' => 'ads.fedit']);
  Route::post('admin/featured-ads/{id}/update/{sid}/{cid}', ['uses' => 'AdminController@updatefAd', 'as' => 'fads.update']);
  Route::post('admin/featured-ads/{id}/destroy', ['uses' => 'AdminController@deletefAd', 'as' => 'adf.destroy']);
  Route::get('admin/add-fimages/{ad}', ['uses' => 'AdminController@getFImages', 'as' => 'add-fimages']);
  Route::post('admin/add-fimages/{ad}', ['uses' => 'AdminController@postFImages', 'as' => 'post-fimages']);
  Route::get('admin/add-fconditions/{id}', ['uses' => 'AdminController@getFConditions', 'as' => 'add-fconditions']);
  Route::post('admin/add-fconditions/{id}', ['uses' => 'AdminController@postFConditions', 'as' => 'post-fconditions']);
});




//Pages routes
Route::get('/', ['uses' => 'PagesController@getIndex', 'as' => 'home']);
Route::get('categories', ['uses' => 'PagesController@getCategory', 'as' => 'cat.index']);
Route::get('categories/{cat}/ads', ['uses' => 'PagesController@getAllAds', 'as' => 'all.ads']);
Route::get('categories/{cat}/ads/{scat}', ['uses' => 'PagesController@getAds', 'as' => 'ad.nxt']);
Route::get('categories/{cat}/ads/{scat}/single/{ad_id}', ['uses' => 'PagesController@getSingle', 'as' => 'ad.single']);
Route::get('results', ['uses' => 'PagesController@getResults', 'as' => 'results']);
Route::get('/search', ['uses' => 'PagesController@getSearch', 'as' => 'search']);
Route::get('categories/{cat}/ads-featured/{scat}/single/{ad_id}', ['uses' => 'PagesController@getAdFSingle', 'as' => 'adf.single']);
