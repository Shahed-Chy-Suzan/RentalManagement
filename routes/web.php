<?php
use illuminate\Support\Facades\Route;

//----------------------------------------------------------------------------------------------------------------
Route::get('/', function(){
    return view('pages.index');
});

            //-------AUTH & USER Section----------
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('update.password');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

            //-------admin---------------
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login'); //--1-
Route::post('admin', 'Admin\LoginController@login');	//--d--

            //-------Password Reset Routes------------
Route::get('admin/password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');	//--d--
Route::get('admin/reset/password/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');	//--d--
Route::get('/admin/Change/Password', 'AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update', 'AdminController@Update_pass')->name('admin.password.update');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');		//--d--




//============================================================================================
                //---------Admin Section-----------
//============================================================================================

        //--------Cities-------------------
Route::get('admin/city', 'Admin\City\CityController@cities')->name('city');
Route::post('admin/store/city', 'Admin\City\CityController@storecity')->name('store.city');
Route::get('delete/city/{id}', 'Admin\City\CityController@deleteCity');
Route::get('edit/city/{id}', 'Admin\City\CityController@editCity');
Route::post('update/city/{id}', 'Admin\City\CityController@updateCity');
        //----------Subcities-------------
Route::get('admin/sub/cities','Admin\City\SubcityController@subcities')->name('subcity');
Route::post('admin/store/subcity','Admin\City\SubcityController@Storesubcity')->name('store.subcity');
Route::get('delete/subcity/{id}', 'Admin\City\SubcityController@deletesubcity');
Route::get('edit/subcity/{id}', 'Admin\City\SubcityController@editsubcity');
Route::post('update/subcity/{id}', 'Admin\City\SubcityController@updatesubcity');
        //--------------Newsletter--------------------
Route::get('admin/newsletter','Admin\ContactController@newsletter')->name('admin.newsletter');
Route::get('delete/newsletter/{id}', 'Admin\ContactController@deletenewsletter');
        //----------Contact/Get_in_Touch/Review-------------
Route::get('admin/contact','Admin\ContactController@contact')->name('admin.new.contact');  //--nav
Route::get('delete/contact/{id}','Admin\ContactController@deleteContact');
Route::get('view/contact/{id}','Admin\ContactController@viewContact');
Route::get('mark/read/contact/{id}','Admin\ContactController@markAsRead');
Route::get('mark/unread/contact/{id}','Admin\ContactController@markAsUnRead');
Route::get('show/review/contact/{id}','Admin\ContactController@showReview');
Route::get('dont/review/contact/{id}','Admin\ContactController@dontShowReview');
Route::get('admin/all/contact','Admin\ContactController@allContact')->name('admin.all.contact');  //--nav
        //-----------site-setting----------------
Route::get('admin/site/setting', 'Admin\SettingController@SiteSetting')->name('admin.site.setting');
Route::post('admin/update/sitesetting', 'Admin\SettingController@UpdateSetting')->name('update.sitesetting');
        //--------User_Property_Request_to_Admin-------------
Route::get('admin/property/add', 'Admin\PropertyController@create')->name('admin.add.property');  //--nav
Route::get('admin/pending/property','Admin\PropertyController@backendUserProperty')->name('pending.user_property'); //-nav
Route::get('delete/property/{id}','Admin\PropertyController@DeleteProperty');
Route::get('view/property/{id}','Admin\PropertyController@ViewProperty');
Route::get('edit/property/{id}','Admin\PropertyController@EditProperty');
Route::post('update/property/withoutphoto/{id}','Admin\PropertyController@UpdatePropertyWithoutPhoto');
Route::post('update/property/photo/{id}','Admin\PropertyController@UpdatePropertyPhoto');
//---------------------
Route::get('admin/property/accept/{id}', 'Admin\PropertyController@uploadProperty');
Route::get('admin/property/cancel/{id}', 'Admin\PropertyController@cancelProperty');
Route::get('admin/uploaded/property', 'Admin\PropertyController@uploadedProperties')->name('admin.uploaded.property'); //-nav
Route::get('admin/delevery/progress/{id}', 'Admin\PropertyController@DeliveryProgress');
Route::get('admin/property/pending/{id}', 'Admin\PropertyController@pendingProperty');
Route::get('admin/delivery/progress', 'Admin\PropertyController@delivery_Progress')->name('admin.delivery.progress'); //-nav
Route::get('admin/delivery/done/{id}', 'Admin\PropertyController@DeliveryDone');
Route::get('admin/delivered/property', 'Admin\PropertyController@successfully_Delivered')->name('admin.delivered.property'); //-nav
Route::get('admin/cancelled/property', 'Admin\PropertyController@cancelledProperty')->name('admin.cancelled.property');  //-nav
        //-----------------Add New Order-----------------
Route::get('admin/add/order','Admin\OrderController@addOrder')->name('admin.add.order');  //-nav
Route::get('admin/new/order','Admin\OrderController@newOrder')->name('admin.new.order');  //-nav
Route::get('admin/all/order','Admin\OrderController@allOrder')->name('admin.all.order');  //-nav
Route::get('delete/order/{id}','Admin\OrderController@deleteOrder');
Route::get('mark/read/order/{id}','Admin\OrderController@markAsRead');
Route::get('mark/unread/order/{id}','Admin\OrderController@markAsUnRead');
Route::get('view/property/order/{property_code}','Admin\OrderController@ViewProperty');




//============================================================================================
                //---------Frontend All Routes are here:-----------
//============================================================================================

        //--------User_Property_Add-------------
Route::post('store/user/property','FrontController@storeUserProperty')->name('store.user.property');  //(user+admin) insert property)
        //-----for All_Property_View/showing-----------
Route::get('properties/{id}', 'PropertyController@subcityPropertyView');   //All_subcity_property
Route::get('city/properties/{id}', 'PropertyController@cityPropertyView'); //All_city_property
        //---------Showing_Individual_Property_deatails-----------
Route::get('property/details/{id}','PropertyController@PropertyDetails');
        //----------Newsletter-------------
Route::post('store/newsletters','FrontController@storeNewsletter')->name('store.newsletters');
        //----------Contact/Get_in_Touch-------------
Route::post('store/contact','FrontController@storeContact')->name('store.contact');
        //----------Modal_Email-------------
Route::post('store/modal/email','WishlistController@storeModal')->name('store.modal.email'); //using Tostr
        //----------Search-----------
Route::get('property/search','FrontController@PropertySearch')->name('property.search');

//------------//--------------//-------------//-------------//-------------//------------//------------//
