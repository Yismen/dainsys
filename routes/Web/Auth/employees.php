<?php

use Illuminate\Support\Facades\Route;

//should not be here...

Route::post('employees/{employee}/address', 'Employee\AddressController@update')
    ->name('employees.update-address');

Route::put('employees/{employee}/ars', 'Employee\ARSController@assign')
    ->name('employees.update-ars');

Route::put('employees/{employee}/afp', 'Employee\AFPController@assign')
    ->name('employees.update-afp');

Route::put('employees/{employee}/supervisor', 'Employee\SupervisorController@assign')
    ->name('employees.update-supervisor');

Route::post('employees/{employee}/card', 'Employee\CardController@update')
    ->name('employees.update-card');

Route::get('employees/export_to_excel/{status}', 'Employee\ExportController@toExcel')
    ->name('employees.export_to_excel');

Route::post('employees/{employee}/login_names', 'Employee\LoginNameController@store')
    ->name('employees.login.create');


Route::post('employees/{employee}/terminate', 'Employee\TerminationController@terminate')
    ->name('employees.terminate');
Route::post('employees/{employee}/reactivate', 'Employee\TerminationController@reactivate')
    ->name('employees.reactivate');

Route::post('employees/{employee}/punch', 'Employee\PunchController@update')
    ->name('employees.update-punch');

Route::post('employees/{employee}/photo', 'Employee\PhotoController@update')
    ->name('employees.update-photo');

Route::put('employees/{employee}/bank-account', 'Employee\BankAccountController@update')
    ->name('employees.update-bank-account');

Route::post('employees/{employee}/social-security', 'Employee\SocialSecurityController@update')
    ->name('employees.update-social-security');

Route::post('employees/{employee}/nationality', 'Employee\NationalityController@assign')
    ->name('employees.update-nationality');

Route::resource('employees', 'EmployeesController')->except(['destroy']);
