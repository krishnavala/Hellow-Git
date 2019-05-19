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



Auth::routes();
Route::get('/', 'UsermasterController@index');

Route::get('/home', 'UsermasterController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//forprofileupdate
Route::get('users/profile', 'HomeController@profile')->name('users.profile');
Route::get('users/{user}', ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::patch('users/{user}/update', ['as' => 'users.update', 'uses' => 'UserController@update']);

//AddUserCRUD
Route::get('index', 'UsermasterController@index')->name('user.list');
Route::get('user/getUserList', 'UsermasterController@getUserList')->name('user.getUserList');
Route::get('user/add', 'UsermasterController@add')->name('user.add');
Route::post('user/store', 'UsermasterController@store')->name('user.store');
Route::post('register', 'RegisterController@create')->name('user.register');

Route::get('user/edit/{id}', 'UsermasterController@edit')->name('user.edit');
Route::post('user/update/{user_id}', 'UsermasterController@update')->name('user.update');
Route::post('user/delete', 'UsermasterController@delete')->name('user.delete');

//AddroleCRUD
Route::get('role/list', 'RoleController@index')->name('role.list');
Route::get('role/getroleList', 'RoleController@getroleList')->name('role.getroleList');
Route::get('role/add', 'RoleController@add')->name('role.add');
Route::post('role/store', 'RoleController@store')->name('role.store');
Route::get('role/edit/{id}', 'RoleController@edit')->name('role.edit');
Route::post('role/update/{role_id}', 'RoleController@update')->name('role.update');
Route::post('role/delete', 'RoleController@delete')->name('role.delete');