<?php

use App\Http\Controllers\Api\Dashboards\HumanResourcesController;
use App\Http\Controllers\Api\Dashboards\ProductionController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\HolidayController;
use App\Http\Controllers\Api\NotificationsController;
use App\Http\Controllers\Api\OvernightHourController;
use App\Http\Controllers\Api\SupervisorsController;
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
    Route::get('/user', [\App\Http\Controllers\Api\UserController::class, 'index']);
    Route::resource('afps', \App\Http\Controllers\Api\AfpsController::class)->only(['store']);
    Route::resource('arss', \App\Http\Controllers\Api\ArssController::class)->only(['store']);
    Route::resource('banks', App\Http\Controllers\Api\BanksController::class)->only(['store']);
    Route::resource('positions', App\Http\Controllers\Api\PositionsController::class)->only(['store']);
    Route::resource('supervisors', App\Http\Controllers\Api\SupervisorsController::class)->only(['store']);
    Route::resource('departments', App\Http\Controllers\Api\DepartmentsController::class)->only('store');
    Route::resource('payment_frequencies', App\Http\Controllers\Api\PaymentFrequenciesController::class)->only(['store']);
    Route::resource('nationalities', App\Http\Controllers\Api\NationalitiesController::class)->only('store');
    Route::post('employees/{employee}/vip', [\App\Http\Controllers\Employee\VIPController::class, 'update'])->name('api.employee.vip');
    Route::post('employees/{employee}/universal', [\App\Http\Controllers\Employee\UniversalController::class, 'update'])->name('api.employee.universal');

    Route::get('employees', [EmployeeController::class, 'index']);
    Route::get('employees/all', [EmployeeController::class, 'index']);
    Route::get('employees/actives', [EmployeeController::class, 'actives']);
    Route::get('employees/recents', [EmployeeController::class, 'recents']);

    Route::get('performances/clients', \App\Http\Controllers\Api\Performances\ClientsController::class);
    Route::get('performances/projects', \App\Http\Controllers\Api\Performances\ProjectsController::class);
    Route::get('performances/campaigns', \App\Http\Controllers\Api\Performances\CampaignsController::class);
    Route::get('performances/sites', \App\Http\Controllers\Api\Performances\SitesController::class);
    Route::get('performances/supervisors', \App\Http\Controllers\Api\Performances\SupervisorsController::class);
    Route::get('performances/downtime_reasons', \App\Http\Controllers\Api\Performances\DowntimeReasonsController::class);
    Route::get('performances/employees', \App\Http\Controllers\Api\Performances\EmployeesController::class);
    Route::get('performances/downtimes', \App\Http\Controllers\Api\Performances\DowntimesController::class);
    Route::get('performances/login_names', \App\Http\Controllers\Api\Performances\LoginNamesController::class);
    Route::get('performances/schedules', \App\Http\Controllers\Api\Performances\SchedulesController::class);
    Route::get('performances/supervisors/actives', [\App\Http\Controllers\Api\Performances\SupervisorsController::class, 'actives']);

    Route::get('performances/performance_data/last/{many}/months', [\App\Http\Controllers\Api\Performances\PerformancesController::class, 'data']);
    // Route::get('/blackhawk/de/management', 'Blackhawk\DE\ManagementController@dashboardData');

    Route::get('holidays', [\App\Http\Controllers\Api\HolidayController::class, 'index']);

    Route::get('dashboards/human_resources/head_counts', [HumanResourcesController::class, 'head_counts']);
    Route::get('dashboards/human_resources/attritions', [HumanResourcesController::class, 'attritions']);
    Route::get('dashboards/human_resources/hc_by_project', [HumanResourcesController::class, 'hc_by_project']);
    Route::get('dashboards/human_resources/hc_by_gender', [HumanResourcesController::class, 'hc_by_gender']);
    Route::get('dashboards/human_resources/hc_by_department', [HumanResourcesController::class, 'hc_by_department']);
    Route::get('dashboards/production/mtd_stats', [ProductionController::class, 'mtd_stats']);
    Route::get('dashboards/production/monthly_stats', [ProductionController::class, 'monthly_stats']);

    Route::get('overnight_hours', [OvernightHourController::class, 'index']); // use get request to limit search date=date||months=0||days=0

    Route::get('notifications/unread', [NotificationsController::class, 'unread']);
    Route::post('notifications/mark-all-as-read', [NotificationsController::class, 'markAllAsRead']);
    Route::get('notifications/show/{notification}', [NotificationsController::class, 'show']);
});
