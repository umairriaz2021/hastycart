<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Login Route
Route::match(['get','post'],'login','AdminController@login')->name('admin.login');
Route::group(['middleware'=>['admin']],function(){
    Route::get('dashboard','AdminController@dashboard')->name('admin.dashboard');
    Route::get('dashbard/settings','AdminController@settings')->name('admin.settings');
    Route::post('dashboard/settings/check-password','AdminController@checkPassword')->name('check.password');
    Route::post('dashboard/settings/update-password','AdminController@update_password')->name('update.password');
    Route::match(['get','post'],'dashboard/settings/update-details','AdminController@update_details')->name('update.details');
    //Section Routes
    Route::get('dashboard/all-sections','SectionController@index')->name('all.sections');
    Route::post('dashboard/sec-active-inactive','SectionController@status_check')->name('status.check');
    Route::match(['get','post'],'dashboard/sections/add-section/{id?}','AdminController@add_edit_sections')->name('section.add_edit');
    
    //Section Routes Ends
    //Categories Routes
    Route::get('dashboard/all-categories','CategoryController@index')->name('all.cat');
    Route::match(['get','post'],'dashboard/add-category/{id?}','CategoryController@addEditCategory')->name('categories.add_edit');
    Route::post('dashboard/cat-active-inactive','CategoryController@cat_status_check')->name('categories.status_check');
    Route::post('dashboard/append-categories','CategoryController@append_cat')->name('append.cat');
    Route::get('dashboard/delete-category-image/{id}','CategoryController@delete_img')->name('cat.del');
    Route::get('dashboard/delete-cat/{id}','CategoryController@delete_cat')->name('category.del');
    //Categories Routes Ends
    //Products Routes
    Route::get('dashboard/all-products','ProductController@index')->name('all.prod');
    Route::match(['get','post'],'dashboard/add-product/{id?}','ProductController@addEditProduct')->name('prod.add_edit');
    Route::post('dashboard/prod-active-inactive','ProductController@prodActiveInactive')->name('prod.active_inactive');
    Route::get('dashboard/prod-delete/{id}','ProductController@prodDelete');
    Route::get('dashboard/products/image-delete/{id}','ProductController@imgDel');
    Route::get('dashboard/products/delete-video/{id}','ProductController@videoDel');
    Route::match(['get','post'],'dashboard/products/add-attributes/{id}','ProductController@addAttributes');
    Route::match(['get','post'],'dashboard/products/edit-attributes/{id}','ProductController@editAttributes');
    Route::post('dashboard/products/attribute-status','ProductController@attrStatus');
    Route::post('dashboard/products/attribute-delete','ProductController@deleteAttribute')->name('attribute.delete');
    //Route::match(['get,post'],'dashboard/products/add-images/{id}','ProductController@addImages');
    Route::match(['get','post'],'dashboard/products/add-images/{id}','ProductController@addImages');
    Route::match(['get','post'],'dashboard/products/edit-images/{id}','ProductController@editImages');
    Route::post('dashboard/products/product-images-status','ProductController@ProductImagesStatus')->name('productimg.active');
    Route::post('dashboard/products/product-image-delete','ProductController@ProductImageDel')->name('productImage.del');
    //Products Routes Ends
    //Brands Routes
    Route::get('dashboard/brands/all-brands','BrandController@index')->name('all.brands');
    Route::match(['get','post'],'dashboard/brands/add-edit/{id?}','BrandController@addEdit')->name('brands.add_edit');
    Route::post('dashboard/brands/brand-status','BrandController@statusChange')->name('brand.status');
    Route::post('dashboard/brands/delete-image','BrandController@deleteBrand')->name('brand.delete');
    //Brands Routes Ends
    
});
Route::get('admin/dashboard/logout','AdminController@logout')->name('admin.logout');