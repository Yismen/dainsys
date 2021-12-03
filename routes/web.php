<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@welcome');
Auth::routes(['register' => false]);

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@admin');

    Route::post('afps/employees', 'AfpsController@assignEmployees');
    Route::resource('afps', 'AfpsController');

    Route::post('arss/employees', 'ArsController@assignEmployees');
    Route::resource('arss', 'ArsController');

    Route::resource('attendance_codes', 'AttendanceCodesController')
        ->except(['create', 'show']);

    Route::get('attendances/date/{date}', 'Attendance\DateController@show')->name('attendances.date');
    Route::get('attendances/date/{date}/code/{code}', 'Attendance\DateController@employees')->name('attendances.date.code');
    Route::get('attendances/code/{code}', 'Attendance\CodeController@show')->name('attendances.code');
    Route::get('attendances/code/{code}/employees', 'Attendance\CodeController@employees')->name('attendances.code.employees');
    Route::get('attendances/employee/{employee}', 'Attendance\EmployeeController@show')->name('attendances.employee');
    Route::resource('attendances', 'AttendancesController');

    Route::resource('banks', 'BanksController')->except(['show', 'create']);

    Route::resource('campaigns', 'CampaignsController');

    Route::resource('cards', 'CardsController');

    Route::resource('clients', 'ClientsController');

    Route::resource('contacts', 'User\ContactsController');

    Route::get('dashboards', 'Dashboards\DashboardController')->name('dashboards');
    Route::get('dashboards/human_resources', 'Dashboards\HumanResourcesDashboardController@index')->name('human_resources_dashboard');

    Route::get('dashboards/owner', 'Dashboards\OwnerDashboardController@index')->name('owner_dashboard');
    Route::get('dashboards/admin', 'Dashboards\AdminDashboardController@index')->name('admin_dashboard');
    Route::get('dashboards/default', 'Dashboards\DefaultDashboardController@index')->name('default_dashboard');

    Route::resource('departments', 'DepartmentsController');

    Route::resource('downtimes', 'DowntimeController')
        ->except('show');

    Route::resource('downtime_reasons', 'DowntimeReasonsController');

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

    Route::resource('holidays', 'HolidayController')
        ->except('show');

    Route::group(['prefix' => 'human_resources', 'middleware' => 'authorize:view-human-resources-dashboard'], function () {
        Route::get('employees/dgt3', 'HumanResources\DGT3Controller@dgt3')->name('human_resources.dgt3.index');
        Route::post('employees/dgt3', 'HumanResources\DGT3Controller@handleDgt3')->name('human_resources.dgt3.show');
        Route::get('employees/dgt3_to_excel/{year}', 'HumanResources\DGT3Controller@excel')->name('human_resources.dgt3.download');

        Route::get('employees/dgt4', 'HumanResources\DGT4Controller@dgt4')->name('human_resources.dgt4.index');
        Route::post('employees/dgt4', 'HumanResources\DGT4Controller@handleDgt4')->name('human_resources.dgt4.show');
        Route::get('employees/dgt4_to_excel/{year}', 'HumanResources\DGT4Controller@excel')->name('human_resources.dgt4.download');

        Route::get('birthdays/this_month', 'HumanResources\BirthdaysController@birthdaysThisMonth')->name('birthdays_this_month');
        Route::get('birthdays/next_month', 'HumanResources\BirthdaysController@birthdaysNextMonth')->name('birthdays_next_month');
        Route::get('birthdays/last_month', 'HumanResources\BirthdaysController@birthdaysLastMonth')->name('birthdays_last_month');
    });

    Route::post('import_overnight_hours', 'ImportOvernightHourController@store')
        ->name('import_overnight_hours.store');
    Route::resource('overnight_hours', 'OvernightHourController')
        ->except('show');

    Route::get('login_names/to-excel/all', 'LoginNamesController@toExcel')->name('login_names.to-excel.all');
    Route::get('login_names/to-excel/all-employees', 'LoginNamesController@employeesToExcel')->name('login_names.to-excel.all-employees');
    Route::resource('login_names', 'LoginNamesController');

    Route::resource('menus', 'MenusController');

    Route::post('nationalities/employees', 'NationalitiesController@assignEmployees')->name('nationalities.assign-employees');
    Route::resource('nationalities', 'NationalitiesController');

    Route::resource('payment_frequencies', 'PaymentFrequenciesController');

    Route::resource('payment_types', 'PaymentTypesController');

    Route::get('performances_import/by_date/{perf_date}', 'PerformanceImportController@show')->name('performances_import.by_date');
    Route::get('/performances_import/mass_delete', 'PerformanceImportController@confirmDestroy')->name('performances_import.confirm_destroy');
    Route::resource('performances_import', 'PerformanceImportController')
        ->except(['show', 'edit', 'update'])
        ->names('performances_import');

    Route::resource('performances', 'PerformanceController')
        ->except('create', 'store');

    Route::resource('permissions', 'PermissionsController');

    Route::resource('positions', 'PositionsController');

    Route::post('profiles/image/{id}', ['as' => 'profiles.image', 'uses' => 'ProfileController@postImage']);
    Route::resource('profiles', 'ProfileController', ['except' => 'destroy']);

    Route::post('projects/employees', 'ProjectsController@assignEmployees');
    Route::resource('projects', 'ProjectsController');

    Route::resource('punches', 'PunchesController');

    Route::resource('revenue_types', 'RevenueTypesController');

    Route::resource('roles', 'RolesController');

    Route::resource('schedules', 'SchedulesController');

    Route::resource('shifts', 'ShiftsController');

    Route::post('sites/employees', 'SitesController@assignEmployees');
    Route::resource('sites', 'SitesController');

    Route::resource('supervisor_users', 'SupervisorUserController');

    Route::post('supervisors/employees', 'SupervisorsController@assignEmployees');

    Route::resource('supervisors', 'SupervisorsController')->except('destroy');

    Route::resource('termination_reasons', 'TerminationReasonController')->except(['destroy']);

    Route::resource('termination_types', 'TerminationTypeController')->except(['destroy']);

    Route::resource('universals', 'UniversalController')
        ->except('create', 'show');

    Route::get('users/search', 'Partials\UserController')->name('users.search');

    Route::get('users/reset_passord', 'User\PasswordController@reset')->name('users.reset-password');
    Route::post('users/reset_passord', 'User\PasswordController@change')->name('users.change-password');

    Route::get('users/force_reset/{user}', 'User\PasswordController@force_reset')->name('users.force_reset');
    Route::post('users/force_reset/{user}', 'User\PasswordController@force_change')->name('users.force_change');

    Route::post('users/settings', 'User\SettingController@update')->name('users.settings');

    Route::get('users/inactive-users', 'UsersController@inactives')->name('users.inactive-users');
    Route::post('users/inactive-users/{id}/restore', 'UsersController@restore')->name('users.inactive-users.restore');

    Route::resource('users', 'UsersController');

    Route::resource('vips', 'VipController')
        ->except('create', 'show');
});
