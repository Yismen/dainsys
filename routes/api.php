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
    Route::resource('afps', 'Api\AfpsController')->only(['store']);
    Route::resource('arss', 'Api\ArssController')->only(['store']);
    Route::resource('banks', 'Api\BanksController')->only(['store']);
    Route::resource('positions', 'Api\PositionsController')->only(['store']);
    Route::resource('supervisors', 'Api\SupervisorsController')->only(['store']);
    Route::resource('departments', 'Api\DepartmentsController')->only('store');
    Route::resource('payment_frequencies', 'Api\PaymentFrequenciesController')->only(['store']);
    Route::resource('nationalities', 'Api\NationalitiesController')->only('store');
    Route::post('employees/{employee}/vip', 'Employee\VIPController@update')->name('api.employee.vip');
    Route::post('employees/{employee}/universal', 'Employee\UniversalController@update')->name('api.employee.universal');

    Route::get('employees', 'Api\EmployeeController@index');
    Route::get('employees/all', 'Api\EmployeeController@index');
    Route::get('employees/actives', 'Api\EmployeeController@actives');
    Route::get('employees/recents', 'Api\EmployeeController@recents');

    Route::get('performances/clients', 'Api\Performances\ClientsController');
    Route::get('performances/projects', 'Api\Performances\ProjectsController');
    Route::get('performances/campaigns', 'Api\Performances\CampaignsController');
    Route::get('performances/sites', 'Api\Performances\SitesController');
    Route::get('performances/supervisors', 'Api\Performances\SupervisorsController');
    Route::get('performances/downtime_reasons', 'Api\Performances\DowntimeReasonsController');
    Route::get('performances/employees', 'Api\Performances\DowntimesController@employees');
    Route::get('performances/downtimes', 'Api\Performances\DowntimesController@index');
    Route::get('performances/login_names', 'Api\Performances\LoginNamesController');
    Route::get('performances/schedules', 'Api\Performances\SchedulesController');
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

    Route::get('notifications/unread', 'Api\NotificationsController@unread');
    Route::post('notifications/mark-all-as-read', 'Api\NotificationsController@markAllAsRead');
    Route::get('notifications/show/{notification}', 'Api\NotificationsController@show');
});
