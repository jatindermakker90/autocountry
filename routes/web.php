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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@redirectAdmin')->name('index');
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'client'], function () {
    Route::get('/files/list','FilesController@fileslist')->name('fileslist');
});

/**
 * Admin routes
 */
Route::group(['prefix' => 'web'], function () {

    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
    Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('list', 'Backend\AdminsController', ['names' => 'admin.admins']);

    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset', 'Backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'Backend\Auth\ForgetPasswordController@reset')->name('admin.password.update');
     // Files Routes
    Route::get('/files/list','FilesController@fileslist')->name('fileslist');
    Route::get('/file/upload','FilesController@getfileuploads')->name('fileupload');
    Route::get('/sku/upload','FilesController@getSKUuploads')->name('skuupload');
    Route::post('/store','FilesController@store')->name('store');
    Route::get('/files/list/{category}','FilesController@filebaseoncategory')->name('filebaseoncategory');
    Route::get('/profile/edit/{user_id}','Backend\AdminsController@profileEditView')->name('profile.editView');
    Route::post('/profile/edit/{user_id}','Backend\AdminsController@profileUpdate')->name('profile.update');
    Route::post('/update/userstatus/{user_id}','Backend\AdminsController@userstatusUpdate')->name('userstatus.update');
    //Route::get('/file/list','Backend\DashboardController@fileslist')->name('admin.fileslist');
});
