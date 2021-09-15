<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('users/reset', 'User\PasswordController@reset')->name('users.reset');
Route::post('users/reset', 'User\PasswordController@change')->name('users.change');

Route::get('users/force_reset/{user}', 'User\PasswordController@force_reset')->name('users.force_reset');
Route::post('users/force_reset/{user}', 'User\PasswordController@force_change')->name('users.force_change');

Route::post('users/update_settings/{user}', 'User\SettingController@updateSettings')->name('users.update_settings');
Route::put('users/settings/{user}', 'User\SettingController@update')->name('users.settings');

Route::get('users/inactive-users', 'UsersController@inactives')->name('users.inactive-users');
Route::post('users/inactive-users/{id}/restore', 'UsersController@restore')->name('users.inactive-users.restore');

Route::resource('users', 'UsersController');
