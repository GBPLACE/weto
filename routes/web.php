<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|admin/propertyList
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function() {
//  Artisan::call('optimize:clear');
	Artisan::call('config:cache');
	Artisan::call('config:clear');
	Artisan::call('cache:clear');
	
//	Artisan::call('route:clear');
	
    return "Cache is cleared";
})->name('cache');

//WetoController
Route::get('/', 'WetoController@index')->name('index');
Route::get('/search', 'WetoController@search')->name('search');
Route::post('/getPropertiesList', 'WetoController@getPropertiesList')->name('getPropertiesList');
Route::get('/propertyDetails/{property}', 'WetoController@propertyDetails')->name('propertyDetails');
Route::post('/addClick', 'WetoController@addClick')->name('addClick');
Route::post('/searchSend', 'WetoController@searchSend')->name('searchSend');
Route::get('/privacy-policy', 'WetoController@privacyPolicy')->name('privacyPolicy');

//CookieController
Route::get('/cookie/set','CookieController@setCookie')->name('setCookie');
Route::get('/cookie/get','CookieController@getCookie')->name('getCookie');

//RegisterController
Route::get('/becomeHost', 'RegisterController@becomeHost')->name('becomeHost');
Route::get('/login', 'RegisterController@login')->name('login');
Route::post('/registerPartner', 'RegisterController@registerPartner')->name('registerPartner');
Route::get('/checkPartnerVerifiedToken/{token}', 'RegisterController@checkPartnerVerifiedToken')->name('checkPartnerVerifiedToken');
Route::post('/loginSubmit', 'RegisterController@loginSubmit')->name('loginSubmit');
Route::get('/logout', 'RegisterController@logout')->name('logout');
//user signup
Route::get('/userSignup', 'RegisterController@userSignup')->name('userSignup');
Route::post('/registerUser', 'RegisterController@registerUser')->name('registerUser');
Route::get('/checkUserVerifiedToken/{token}', 'RegisterController@checkUserVerifiedToken')->name('checkUserVerifiedToken');
//Forgot Password
Route::get('/email', 'RegisterController@email')->name('email');
Route::post('/emailSubmit', 'RegisterController@emailSubmit')->name('emailSubmit');
Route::get('/checkResetPasswordToken/{token}', 'RegisterController@checkResetPasswordToken')->name('checkResetPasswordToken');
Route::post('/submitPasswordResetForm', 'RegisterController@submitPasswordResetForm')->name('submitPasswordResetForm');


//partner controller
Route::group(['prefix' => 'partner', 'middleware' => 'PartnerLoginMiddleware'], function () {
    Route::get('/settings', 'PartnerController@settings')->name('settings');
    Route::post('/submitSettings', 'PartnerController@submitSettings')->name('submitSettings');
    Route::get('/partnerPropertyList', 'PartnerController@partnerPropertyList')->name('partnerPropertyList');
    Route::post('/getPartnerProperties', 'PartnerController@getPartnerProperties')->name('getPartnerProperties');
    Route::get('/partnerPropertyDetails/{id}', 'PartnerController@partnerPropertyDetails')->name('partnerPropertyDetails');
    Route::get('/editProperty/{id}', 'PartnerController@editProperty')->name('editProperty');
    Route::post('/submitEditedProperty', 'PartnerController@submitEditedProperty')->name('submitEditedProperty');

    Route::post('/photos-sortable' ,'PartnerController@photosSortable')->name('photos.sortable');

    //add property by partner
    Route::get('/addProperty', 'PartnerController@addProperty')->name('addProperty');
    Route::post('/submitProperty', 'PartnerController@submitProperty')->name('submitProperty');

    //delete property
    Route::post('/deleteProperty', 'PartnerController@deleteProperty')->name('deleteProperty');

    //set Unavailability
    Route::get('/setUnavailability/{id}', 'PartnerController@setUnavailability')->name('setUnavailability');
    Route::post('/submitUnavailabilityDates', 'PartnerController@submitUnavailabilityDates')->name('submitUnavailabilityDates');
    Route::post('/getUnavailableDates', 'PartnerController@getUnavailableDates')->name('getUnavailableDates');
    Route::post('/deleteUnavailabilityDate', 'PartnerController@deleteUnavailabilityDate')->name('deleteUnavailabilityDate');
    Route::post('/getCalenderUnavailableDates', 'PartnerController@getCalenderUnavailableDates')->name('getCalenderUnavailableDates');

    //Drafts
    Route::get('/draft', 'PartnerController@draft')->name('draft');
    Route::post('/getDrafts', 'PartnerController@getDrafts')->name('getDrafts');
    Route::post('/deleteDraft', 'PartnerController@deleteDraft')->name('deleteDraft');

    //blocked properties
    Route::get('/blockedProperties', 'PartnerController@blockedProperties')->name('blockedProperties');
    Route::post('/getPartnerBlockedProperties', 'PartnerController@getPartnerBlockedProperties')->name('getPartnerBlockedProperties');
});
//delete other photo for both admin and user
Route::post('/deleteOtherPhoto', 'PartnerController@deleteOtherPhoto')->name('deleteOtherPhoto');
//graph for both admin and partner
Route::post('/getGraphData', 'PartnerController@getGraphData')->name('getGraphData');

//user Controller
Route::group(['prefix' => 'user', 'middleware' => 'UserLoginMiddleware'], function () {
    Route::get('/addToWishList/{id}', 'UserController@addToWishList')->name('addToWishList');
    Route::get('/removeFromWishList/{id}', 'UserController@removeFromWishList')->name('removeFromWishList');
    Route::get('/wishList', 'UserController@wishList')->name('wishList');
    Route::post('/getWishList', 'UserController@getWishList')->name('getWishList');
    Route::post('/deleteFromWishList', 'UserController@deleteFromWishList')->name('deleteFromWishList');
    Route::get('/userSettings', 'UserController@userSettings')->name('userSettings');
    Route::post('/submitUserSettings', 'UserController@submitUserSettings')->name('submitUserSettings');
});


//Admin Login
Route::get('/admin/login', 'AdminController@adminLogin')->name('adminLogin');
Route::post('/admin/submitAdminLogin', 'AdminController@submitAdminLogin')->name('submitAdminLogin');

//Admin forgot password
Route::get('/admin/forgotPassword', 'AdminController@forgotPassword')->name('forgotPassword');

Route::post('/admin/submitAdminEmail', 'AdminController@submitAdminEmail')->name('submitAdminEmail');
Route::get('/admin/checkAdminResetPasswordToken/{token}', 'AdminController@propertyList')->name('checkAdminResetPasswordToken');
Route::post('/admin/submitAdminPasswordReset', 'AdminController@submitAdminPasswordReset')->name('submitAdminPasswordReset');

//Admin Logout
Route::get('/admin/adminLogout', 'AdminController@adminLogout')->name('adminLogout');

//Admin Controller
Route::group(['prefix' => 'admin', 'middleware' => 'AdminLoginMiddleware'], function () {
    //dashboard
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    //user list
    Route::get('/usersList', 'AdminController@usersList')->name('usersList');
    Route::post('/getUsersList', 'AdminController@getUsersList')->name('getUsersList');
    Route::post('/deleteUser', 'AdminController@deleteUser')->name('deleteUser');
    //partner list
    Route::get('/partnersList', 'AdminController@partnersList')->name('partnersList');
    Route::post('/getPartnersList', 'AdminController@getPartnersList')->name('getPartnersList');
    Route::post('/deletePartner', 'AdminController@deletePartner')->name('deletePartner');
    //partner details
    Route::get('/partnersList/partnerDetails/{id}', 'AdminController@partnerDetails')->name('partnerDetails');
    Route::post('/getPartnerPropertiesForAdmin', 'AdminController@getPartnerPropertiesForAdmin')->name('getPartnerPropertiesForAdmin');
    Route::post('/addToFeatured', 'AdminController@addToFeatured')->name('addToFeatured');
    Route::post('/removeFromFeatured', 'AdminController@removeFromFeatured')->name('removeFromFeatured');
    Route::post('/blockProperty', 'AdminController@blockProperty')->name('blockProperty');
    Route::post('/unblockProperty', 'AdminController@unblockProperty')->name('unblockProperty');
    Route::post('/deletePropertyByAdmin', 'AdminController@deletePropertyByAdmin')->name('deletePropertyByAdmin');
    //update property
    Route::get('/updateProperty/{id}', 'AdminController@updateProperty')->name('updateProperty');
    Route::post('/submitUpdatedProperty', 'AdminController@submitUpdatedProperty')->name('submitUpdatedProperty');
    //view property
    Route::get('/viewPropertyDetails/{id}', 'AdminController@viewPropertyDetails')->name('viewPropertyDetails');
    //unavailable dates
    Route::post('/submitAdminUnavailabilityDates', 'AdminController@submitAdminUnavailabilityDates')->name('submitAdminUnavailabilityDates');
    Route::post('/getAdminCalenderUnavailableDates', 'AdminController@getAdminCalenderUnavailableDates')->name('getAdminCalenderUnavailableDates');
    Route::post('/getAdminUnavailableDates', 'AdminController@getAdminUnavailableDates')->name('getAdminUnavailableDates');
    Route::post('/deleteAdminUnavailabilityDate', 'AdminController@deleteAdminUnavailabilityDate')->name('deleteAdminUnavailabilityDate');
    //property list
    Route::get('/propertyList', 'AdminController@propertyList')->name('propertyList');
    Route::get('/pendingPropertyList', 'AdminController@pendingPropertyList')->name('pendingpropertyList');
    Route::get('/rejectPropertyList', 'AdminController@rejectPropertyList')->name('rejectPropertyList');

    Route::post('/rejectedPropertyList', 'AdminController@rejectedPropertyList')->name('rejectedPropertyList');

    Route::post('/getPropertyListForAdmin', 'AdminController@getPropertyListForAdmin')->name('getPropertyListForAdmin');
    Route::post('/getPendingPropertyListForAdmin', 'AdminController@getPendingPropertyListForAdmin')->name('getPendingPropertyListForAdmin');

    Route::post('/approveProperties', 'AdminController@approveProperties')->name('approveProperties');
    Route::post('/rejectProperties', 'AdminController@rejectProperties')->name('rejectProperties');

    //settings
    Route::get('/settings', 'AdminController@adminSettings')->name('adminSettings');
    Route::post('/submitAdminSettings', 'AdminController@submitAdminSettings')->name('submitAdminSettings');
    //add countries
    Route::get('/countries', 'AdminController@countries')->name('countries');
    Route::post('/addCountry', 'AdminController@addCountry')->name('addCountry');
    Route::post('/getCountriesList', 'AdminController@getCountriesList')->name('getCountriesList');
    Route::post('/deleteCountry', 'AdminController@deleteCountry')->name('deleteCountry');
    Route::post('/editCountry', 'AdminController@editCountry')->name('editCountry');
    //site contents
    Route::get('/site-content' ,'AdminController@siteContent')->name('site.content.create');
    Route::post('/site-content' ,'AdminController@siteContentPost')->name('site.content.created');
    //site SEO
    Route::get('/site-seo' ,'AdminController@siteSeo')->name('site.Seo.create');
    Route::post('/site-Seo' ,'AdminController@siteSeoPost')->name('site.pages.seo');
    Route::post('/page-Seo-content' ,'AdminController@pageSeoContent')->name('page.Seo.content');
    //add admins
    Route::get('/admins' ,'AdminController@addAdmin')->name('admin');
    Route::post('/admin-added' ,'AdminController@createAdmin')->name('admin.create');
    Route::post('/adminList', 'AdminController@adminList')->name('admin.list');
    Route::get('/admin-edit/{adminId}', 'AdminController@adminEdit')->name('admin.edit');
    Route::post('/admin-update', 'AdminController@updateAdmin')->name('admin.update');
    Route::get('/admin-delete/{id}', 'AdminController@adminDelete')->name('admin.delete');
    //villas
    Route::get('/villa' ,'AdminController@villa')->name('villa');
    Route::post('/villa-added' ,'AdminController@villaAdd')->name('villa.added');
    Route::post('/get-countries-list', 'AdminController@getVillasList')->name('villa.list');
    Route::post('/edit-villa', 'AdminController@editVilla')->name('villa.edit');
    Route::post('/delete-villa', 'AdminController@deleteVilla')->name('villa.delete');
    //property type
    Route::get('/property-type' ,'AdminController@propertyType')->name('property.type');
    Route::post('/property-type' ,'AdminController@AddPropertyType')->name('property.type.add');
    Route::post('/get-property-type-list', 'AdminController@getPropertyTypeList')->name('property.type.list');
    Route::post('/edit-property-type', 'AdminController@editPropertyType')->name('property.type.edit');
    Route::post('/delete-property-type', 'AdminController@deletePropertyType')->name('property.type.delete');
});
