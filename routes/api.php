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

    Route::get('employees', [\App\Http\Controllers\Api\EmployeeController::class, 'index']);
    Route::get('employees/all', [\App\Http\Controllers\Api\EmployeeController::class, 'index']);
    Route::get('employees/actives', [\App\Http\Controllers\Api\EmployeeController::class, 'actives']);
    Route::get('employees/recents', [\App\Http\Controllers\Api\EmployeeController::class, 'recents']);

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

    Route::get('dashboards/human_resources/head_counts', [\App\Http\Controllers\Api\Dashboards\HumanResourcesController::class, 'head_counts']);
    Route::get('dashboards/human_resources/attritions', [\App\Http\Controllers\Api\Dashboards\HumanResourcesController::class, 'attritions']);
    Route::get('dashboards/human_resources/hc_by_project', [\App\Http\Controllers\Api\Dashboards\HumanResourcesController::class, 'hc_by_project']);
    Route::get('dashboards/human_resources/hc_by_gender', [\App\Http\Controllers\Api\Dashboards\HumanResourcesController::class, 'hc_by_gender']);
    Route::get('dashboards/human_resources/hc_by_department', [\App\Http\Controllers\Api\Dashboards\HumanResourcesController::class, 'hc_by_department']);
    Route::get('dashboards/production/mtd_stats', [\App\Http\Controllers\Api\Dashboards\ProductionController::class, 'mtd_stats']);
    Route::get('dashboards/production/monthly_stats', [\App\Http\Controllers\Api\Dashboards\ProductionController::class, 'monthly_stats']);

    Route::get('overnight_hours', [\App\Http\Controllers\Api\OvernightHourController::class, 'index']); // use get request to limit search date=date||months=0||days=0

    Route::get('notifications/unread', [\App\Http\Controllers\Api\NotificationsController::class, 'unread']);
    Route::post('notifications/mark-all-as-read', [\App\Http\Controllers\Api\NotificationsController::class, 'markAllAsRead']);
    Route::get('notifications/show/{notification}', [\App\Http\Controllers\Api\NotificationsController::class, 'show']);
});

Route::prefix('v2')->group(function () {
    Route::middleware(['auth:api'])->group(function () {
        Route::get('/user', [\App\Http\Controllers\Api\V2\UserController::class, 'index']);

        Route::get('employees', [\App\Http\Controllers\Api\V2\EmployeesController::class, 'index']);
        Route::get('employees/actives', [\App\Http\Controllers\Api\V2\EmployeesController::class, 'actives']);
        Route::get('employees/all', [\App\Http\Controllers\Api\V2\EmployeesController::class, 'index']);
        Route::get('employees/recents', [\App\Http\Controllers\Api\V2\EmployeesController::class, 'recents']);
        Route::post('employees/{employee}/universal', [\App\Http\Controllers\Api\V2\Employee\UniversalController::class, 'update'])->name('api.v2.employee.universal');
        Route::post('afps', [\App\Http\Controllers\Api\V2\AfpsController::class, 'store']);
        Route::post('arss', [\App\Http\Controllers\Api\V2\ArssController::class, 'store']);
        Route::post('banks', [\App\Http\Controllers\Api\V2\BanksController::class, 'store']);
        Route::post('departments', [\App\Http\Controllers\Api\V2\DepartmentsController::class, 'store']);
        Route::post('employees/{employee}/vip', [\App\Http\Controllers\Api\V2\Employee\VIPController::class, 'update'])->name('api.v2.employee.vip');
        Route::post('nationalities', [\App\Http\Controllers\Api\V2\NationalitiesController::class, 'store']);
        Route::post('payment_frequencies', [\App\Http\Controllers\Api\V2\PaymentFrequenciesController::class, 'store']);
        Route::post('positions', [\App\Http\Controllers\Api\V2\PositionsController::class, 'store']);
        Route::post('supervisors', [\App\Http\Controllers\Api\V2\SupervisorsController::class, 'store']);

        // Route::get('employees', \App\Http\Controllers\Api\V2\EmployeesController::class);
        Route::get('campaigns', \App\Http\Controllers\Api\V2\CampaignsController::class);
        Route::get('clients', \App\Http\Controllers\Api\V2\ClientsController::class);
        Route::get('downtime_reasons', \App\Http\Controllers\Api\V2\DowntimeReasonsController::class);
        Route::get('downtimes', \App\Http\Controllers\Api\V2\DowntimesController::class);
        Route::get('dispositions', \App\Http\Controllers\Api\V2\DispositionsController::class);
        Route::get('login_names', \App\Http\Controllers\Api\V2\LoginNamesController::class);
        Route::get('projects', \App\Http\Controllers\Api\V2\ProjectsController::class);
        Route::get('schedules', \App\Http\Controllers\Api\V2\SchedulesController::class);
        Route::get('sites', \App\Http\Controllers\Api\V2\SitesController::class);
        Route::get('supervisors', \App\Http\Controllers\Api\V2\SupervisorsController::class);
        Route::get('supervisors/actives', [\App\Http\Controllers\Api\V2\SupervisorsController::class, 'actives']);

        Route::get('performances', [\App\Http\Controllers\Api\V2\PerformancesController::class, 'index']);

        Route::get('holidays', [\App\Http\Controllers\Api\V2\HolidayController::class, 'index']);

        Route::get('dashboards/human_resources/head_counts', [\App\Http\Controllers\Api\V2\Dashboards\HumanResourcesController::class, 'head_counts']);
        Route::get('dashboards/human_resources/attritions', [\App\Http\Controllers\Api\V2\Dashboards\HumanResourcesController::class, 'attritions']);
        Route::get('dashboards/human_resources/hc_by_project', [\App\Http\Controllers\Api\V2\Dashboards\HumanResourcesController::class, 'hc_by_project']);
        Route::get('dashboards/human_resources/hc_by_gender', [\App\Http\Controllers\Api\V2\Dashboards\HumanResourcesController::class, 'hc_by_gender']);
        Route::get('dashboards/human_resources/hc_by_department', [\App\Http\Controllers\Api\V2\Dashboards\HumanResourcesController::class, 'hc_by_department']);
        Route::get('dashboards/production/mtd_stats', [\App\Http\Controllers\Api\V2\Dashboards\ProductionController::class, 'mtd_stats']);
        Route::get('dashboards/production/monthly_stats', [\App\Http\Controllers\Api\V2\Dashboards\ProductionController::class, 'monthly_stats']);

        Route::get('overnight_hours', [\App\Http\Controllers\Api\V2\OvernightHourController::class, 'index']); // use get request to limit search date=date||months=0||days=0

        Route::get('notifications/unread', [\App\Http\Controllers\Api\V2\NotificationsController::class, 'unread']);
        Route::post('notifications/mark-all-as-read', [\App\Http\Controllers\Api\V2\NotificationsController::class, 'markAllAsRead']);
        Route::get('notifications/show/{notification}', [\App\Http\Controllers\Api\V2\NotificationsController::class, 'show']);
    });
});
