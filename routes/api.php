<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::get('/user', 'Api\UserController@index');
    Route::resource('employee', 'Api\EmployeeController')->except(['create', 'edit']);
    Route::resource('positions', 'PositionsController')->only(['index', 'create', 'store']);
    Route::resource('arss', 'ArsController')->only(['index', 'store']);
    Route::resource('afps', 'AfpsController')->only(['index', 'store']);
    Route::resource('banks', 'BanksController')->only(['index', 'store']);
    Route::resource('supervisors', 'SupervisorsController')->only(['index', 'store']);
    Route::resource('departments', 'DepartmentsController');
    Route::resource('nationalities', 'NationalitiesController')->only('store');
    Route::resource('payment_frequencies', 'PaymentFrequenciesController');
    Route::post('employees/{employee}/vip', 'Employee\VIPController@update');
    Route::post('employees/{employee}/universal', 'Employee\UniversalController@update');

    Route::get('employees', 'Api\EmployeeController@index');
    Route::get('employees/all', 'Api\EmployeeController@index');
    Route::get('employees/actives', 'Api\EmployeeController@actives');
    Route::get('employees/recents', 'Api\EmployeeController@recents');

    Route::get('performances/clients', 'Api\Performances\ClientsController@list');
    Route::get('performances/projects', 'Api\Performances\ProjectsController@list');
    Route::get('performances/campaigns', 'Api\Performances\CampaignsController@list');
    Route::get('performances/downtimes', 'Api\Performances\PerformancesController@downtimes');
    Route::get('performances/downtime_reasons', 'Api\Performances\DowntimesController@reasons');
    Route::get('performances/employees', 'Api\Performances\DowntimesController@employees');
    Route::get('performances/login_names', 'Api\Performances\EmployeesController@loginNames');
    Route::get('performances/schedules', 'Api\Performances\EmployeesController@schedules');
    Route::get('performances/sites', 'Api\Performances\SitesController@list');
    Route::get('performances/supervisors', 'Api\Performances\SupervisorsController@list');
    Route::get('performances/supervisors/actives', 'Api\Performances\SupervisorsController@actives');

    Route::get('performances/performance_data/last/{many}/months', 'Api\Performances\PerformancesController@data');
    Route::get('/blackhawk/de/management', 'Blackhawk\DE\ManagementController@dashboardData');

    Route::get('holidays', 'Api\HolidayController@index');

    Route::get('dashboards/human_resources/head_counts', 'Api\Dashboards\HumanResourcesController@head_counts');
    Route::get('dashboards/human_resources/attritions', 'Api\Dashboards\HumanResourcesController@attritions');
    Route::get('dashboards/human_resources/hc_by_project', 'Api\Dashboards\HumanResourcesController@hc_by_project');
    Route::get('dashboards/human_resources/hc_by_gender', 'Api\Dashboards\HumanResourcesController@hc_by_gender');
    Route::get('dashboards/human_resources/hc_by_department', 'Api\Dashboards\HumanResourcesController@hc_by_department');
    Route::get('dashboards/production/mtd_stats', 'Api\Dashboards\ProductionController@mtd_stats');
    Route::get('dashboards/production/monthly_stats', 'Api\Dashboards\ProductionController@monthly_stats');

    Route::get('overnight_hours', 'Api\OvernightHourController@index'); // use get request to limit search date=date||months=0||days=0

    // Route::get('notifications/unread', 'Api\NotificationsController@unread');
    // Route::post('notifications/mark-all-as-read', 'Api\NotificationsController@markAllAsRead');
    // Route::get('notifications/show/{notification}', 'Api\NotificationsController@show');
});
