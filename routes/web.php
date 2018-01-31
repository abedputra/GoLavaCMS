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

Route::get('/', 'FrontendController@index')->name('home');
Route::get('/blog/{slug}', 'FrontendController@showblog'); //show the blog page
Route::get('/{slug}', 'FrontendController@showpage'); //show the page

Route::group(['prefix' => 'admin'], function() {
    Auth::routes();
    //dashboard
    Route::get('/home', 'HomeController@index')->name('home'); //main dashboard
    //blog
    Route::get('/home/blog', 'HomeController@blog'); //view list of blog
    Route::get('/home/blog/add', 'HomeController@showadd'); //view add blog form
    Route::post('/home/blog/add/store', 'HomeController@storeadd'); //proccess add blog
    Route::get('/home/blog/edit/{id}', 'HomeController@showedit'); //view edit blog form
    Route::put('/home/blog/edit/store/{id}', 'HomeController@storeedit'); //proccess edit blog
    Route::get('/home/blog/delete/{id}', 'HomeController@deleteblog'); //delete blog
    //Profile
    Route::get('/home/profile', 'HomeController@profile'); //profile user
    Route::get('/home/profile/edit', 'HomeController@profileedit'); //profile edit view
    Route::get('/home/profile/{id}', 'HomeController@profileid'); //show single profile user
    Route::put('/home/profile/store/{id}', 'HomeController@profileeditstore'); //profile store
    Route::get('/home/user', 'HomeController@user'); //all user
    Route::get('/home/user/delete/{id}', 'HomeController@deleteuser'); //delete user
    //page
    Route::get('/home/page', 'HomeController@page'); //view list of page
    Route::get('/home/page/add', 'HomeController@addpage'); //view add page form
    Route::post('/home/page/add/store', 'HomeController@storepage'); //proccess add page
    Route::get('/home/page/edit/{id}', 'HomeController@showeditpage'); //view edit page form
    Route::put('/home/page/edit/store/{id}', 'HomeController@storeeditpage'); //proccess edit page
    Route::get('/home/page/delete/{id}', 'HomeController@deletepage'); //delete page
    //navbar
    Route::get('/home/navbar/add', 'NavbarController@addnavbar'); //add navbar
    Route::post('/home/navbar/add/mainstore', 'NavbarController@storenavbarmainmenu'); //proccess navbar main menu
    Route::post('/home/navbar/add/substore', 'NavbarController@storenavbarsubmenu'); //proccess navbar sub menu
    Route::get('/home/navbar', 'NavbarController@listnavbar'); //list navbar
    Route::get('/home/navbar/delete/mainmenu/{id}', 'NavbarController@deletemainmenu'); //delete main menu
    Route::get('/home/navbar/delete/submenu/{id}', 'NavbarController@deletesubmenu'); //delete sub menu
    //setting
    Route::get('/home/setting/', 'HomeController@setting'); //setting page
    Route::post('/home/setting/storesetting/{id}', 'HomeController@storesetting'); //proccess save setting
    //media
    Route::get('/home/media/', 'HomeController@media'); //media
    Route::get('/home/media/add/', 'HomeController@addmedia'); //add media
    Route::post('/home/media/add/storemedia', 'HomeController@uploadimage'); //upload & save media
    Route::get('/home/media/delete/{id}', 'HomeController@deletemedia'); //delete media
});
