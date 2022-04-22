<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsController;
use App\Http\Controllers\BanksController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\SitesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\CampaignsController;
use App\Http\Controllers\LoginNamesController;
use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\SupervisorsController;
use App\Http\Controllers\NationalitiesController;
use App\Http\Controllers\Partials\UserController;
use App\Http\Controllers\User\PasswordController;
use App\Http\Controllers\Attendance\CodeController;
use App\Http\Controllers\Attendance\DateController;
use App\Http\Controllers\AttendanceCodesController;
use App\Http\Controllers\PerformanceImportController;
use App\Http\Controllers\HumanResources\DGT3Controller;
use App\Http\Controllers\HumanResources\DGT4Controller;
use App\Http\Controllers\Dashboards\DashboardController;
use App\Http\Controllers\HumanResources\BirthdaysController;

Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');
Auth::routes(['register' => false]);

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'admin']);

    Route::post('afps/employees', [\App\Http\Controllers\AfpsController::class, 'assignEmployees']);
    Route::resource('afps', \App\Http\Controllers\AfpsController::class);

    Route::post('arss/employees', [ArsController::class, 'assignEmployees']);
    Route::resource('arss', ArsController::class);

    Route::resource('attendance_codes', AttendanceCodesController::class)
        ->except(['create', 'show']);

    Route::get('attendances/date/{date}', [DateController::class, 'show'])->name('attendances.date');
    Route::get('attendances/date/{date}/code/{code}', [DateController::class, 'employees'])->name('attendances.date.code');
    Route::get('attendances/code/{code}', [CodeController::class, 'show'])->name('attendances.code');
    Route::get('attendances/code/{code}/employees', [CodeController::class, 'employees'])->name('attendances.code.employees');
    Route::get('attendances/employee/{employee}', [\App\Http\Controllers\Attendance\EmployeeController::class, 'show'])->name('attendances.employee');
    Route::resource('attendances', AttendancesController::class);

    Route::resource('banks', BanksController::class)->except(['show', 'create']);

    Route::resource('campaigns', CampaignsController::class);

    Route::resource('cards', CardsController::class);

    Route::resource('clients', ClientsController::class);

    Route::resource('contacts', \App\Http\Controllers\User\ContactsController::class);

    Route::group(['prefix' => 'dashboards'], function () {
        Route::get('', DashboardController::class)
            ->name('');
        Route::get('human_resources', \App\Http\Controllers\Dashboards\HumanResourcesDashboardController::class)
            ->name('human_resources_dashboard');
        Route::get('owner', \App\Http\Controllers\Dashboards\OwnerDashboardController::class)
            ->name('owner_dashboard');
        Route::get('admin', \App\Http\Controllers\Dashboards\AdminDashboardController::class)
            ->name('admin_dashboard');
        Route::get('default', \App\Http\Controllers\Dashboards\DefaultDashboardController::class)
            ->name('default_dashboard');
    });

    Route::resource('departments', \App\Http\Controllers\DepartmentsController::class);

    Route::resource('downtimes', \App\Http\Controllers\DowntimeController::class)
        ->except('show');

    Route::resource('downtime_reasons', \App\Http\Controllers\DowntimeReasonsController::class);

    Route::post('employees/{employee}/address', [\App\Http\Controllers\Employee\AddressController::class, 'update'])
        ->name('employees.update-address');
    Route::put('employees/{employee}/ars', [\App\Http\Controllers\Employee\ARSController::class, 'assign'])
        ->name('employees.update-ars');
    Route::put('employees/{employee}/afp', [\App\Http\Controllers\Employee\AFPController::class, 'assign'])
        ->name('employees.update-afp');
    Route::put('employees/{employee}/supervisor', [\App\Http\Controllers\Employee\SupervisorController::class, 'assign'])
        ->name('employees.update-supervisor');
    Route::post('employees/{employee}/card', [\App\Http\Controllers\Employee\CardController::class, 'update'])
        ->name('employees.update-card');
    Route::get('employees/export_to_excel/{status}', [\App\Http\Controllers\Employee\ExportController::class, 'toExcel'])
        ->name('employees.export_to_excel');
    Route::post('employees/{employee}/login_names', [\App\Http\Controllers\Employee\LoginNameController::class, 'store'])
        ->name('employees.login.create');
    Route::post('employees/{employee}/terminate', [\App\Http\Controllers\Employee\TerminationController::class, 'terminate'])
        ->name('employees.terminate');
    Route::post('employees/{employee}/reactivate', [\App\Http\Controllers\Employee\TerminationController::class, 'reactivate'])
        ->name('employees.reactivate');
    Route::post('employees/{employee}/punch', [\App\Http\Controllers\Employee\PunchController::class, 'update'])
        ->name('employees.update-punch');
    Route::post('employees/{employee}/photo', [\App\Http\Controllers\Employee\PhotoController::class, 'update'])
        ->name('employees.update-photo');
    Route::put('employees/{employee}/bank-account', [\App\Http\Controllers\Employee\BankAccountController::class, 'update'])
        ->name('employees.update-bank-account');
    Route::post('employees/{employee}/social-security', [\App\Http\Controllers\Employee\SocialSecurityController::class, 'update'])
        ->name('employees.update-social-security');
    Route::post('employees/{employee}/nationality', [\App\Http\Controllers\Employee\NationalityController::class, 'assign'])
        ->name('employees.update-nationality');
    Route::resource('employees', \App\Http\Controllers\EmployeesController::class)
        ->except(['destroy']);

    Route::resource('holidays', \App\Http\Controllers\HolidayController::class)
        ->except('show');

    Route::group(['prefix' => 'human_resources', 'middleware' => 'authorize:view-human-resources-dashboard'], function () {
        Route::get('employees/dgt3', [DGT3Controller::class, 'dgt3'])
            ->name('human_resources.dgt3.index');
        Route::post('employees/dgt3', [DGT3Controller::class, 'handleDgt3'])
            ->name('human_resources.dgt3.show');
        Route::get('employees/dgt3_to_excel/{year}', [DGT3Controller::class, 'excel'])
            ->name('human_resources.dgt3.download');

        Route::get('employees/dgt4', [DGT4Controller::class, 'dgt4'])
            ->name('human_resources.dgt4.index');
        Route::post('employees/dgt4', [DGT4Controller::class, 'handleDgt4'])
            ->name('human_resources.dgt4.show');
        Route::get('employees/dgt4_to_excel/{year}', [DGT4Controller::class, 'excel'])
            ->name('human_resources.dgt4.download');

        Route::get('birthdays/this_month', [BirthdaysController::class, 'birthdaysThisMonth'])
            ->name('birthdays_this_month');
        Route::get('birthdays/next_month', [BirthdaysController::class, 'birthdaysNextMonth'])
            ->name('birthdays_next_month');
        Route::get('birthdays/last_month', [BirthdaysController::class, 'birthdaysLastMonth'])
            ->name('birthdays_last_month');
    });

    Route::post('import_overnight_hours', [\App\Http\Controllers\ImportOvernightHourController::class, 'store'])
        ->name('import_overnight_hours.store');
    Route::resource('overnight_hours', \App\Http\Controllers\OvernightHourController::class)
        ->except('show');

    Route::get('login_names/to-excel/all', [LoginNamesController::class, 'toExcel'])
        ->name('login_names.to-excel.all');
    Route::get('login_names/to-excel/all-employees', [LoginNamesController::class, 'employeesToExcel'])
        ->name('login_names.to-excel.all-employees');
    Route::resource('login_names', LoginNamesController::class);

    Route::resource('menus', \App\Http\Controllers\MenusController::class);

    Route::post('nationalities/employees', [NationalitiesController::class, 'assignEmployees'])
        ->name('nationalities.assign-employees');
    Route::resource('nationalities', NationalitiesController::class);

    Route::resource('payment_frequencies', \App\Http\Controllers\PaymentFrequenciesController::class);

    Route::resource('payment_types', \App\Http\Controllers\PaymentTypesController::class);

    Route::get('performances_import/by_date/{perf_date}', [PerformanceImportController::class, 'show'])
        ->name('performances_import.by_date');
    Route::get('/performances_import/mass_delete', [PerformanceImportController::class, 'confirmDestroy'])
        ->name('performances_import.confirm_destroy');
    Route::resource('performances_import', PerformanceImportController::class)
        ->except(['show', 'edit', 'update'])
        ->names('performances_import');

    Route::resource('performances', \App\Http\Controllers\PerformanceController::class)
        ->except('create', 'store');

    Route::resource('permissions', \App\Http\Controllers\PermissionsController::class);

    Route::resource('positions', \App\Http\Controllers\PositionsController::class);

    Route::post('profiles/image/{id}', [ProfileController::class, 'postImage'])
        ->name('profiles.image');
    Route::resource('profiles', ProfileController::class)
        ->except(['destroy']);

    Route::post('projects/employees', [ProjectsController::class, 'assignEmployees']);
    Route::resource('projects', ProjectsController::class);

    Route::resource('punches', \App\Http\Controllers\PunchesController::class);

    Route::resource('revenue_types', \App\Http\Controllers\RevenueTypesController::class);

    Route::resource('roles', \App\Http\Controllers\RolesController::class);

    Route::resource('schedules', \App\Http\Controllers\SchedulesController::class);

    Route::resource('shifts', \App\Http\Controllers\ShiftsController::class);

    Route::post('sites/employees', [SitesController::class, 'assignEmployees']);
    Route::resource('sites', SitesController::class);

    Route::resource('supervisor_users', \App\Http\Controllers\SupervisorUserController::class);

    Route::post('supervisors/employees', [SupervisorsController::class, 'assignEmployees']);

    Route::resource('supervisors', SupervisorsController::class)
        ->except('destroy');

    Route::resource('termination_reasons', \App\Http\Controllers\TerminationReasonController::class)
        ->except(['destroy']);

    Route::resource('termination_types', \App\Http\Controllers\TerminationTypeController::class)
        ->except(['destroy']);

    Route::resource('universals', \App\Http\Controllers\UniversalController::class)
        ->except('create', 'show');

    Route::get('users/search', UserController::class)
        ->name('users.search');

    Route::get('users/reset_passord', [PasswordController::class,  'reset'])
        ->name('users.reset-password');
    Route::post('users/reset_passord', [PasswordController::class,  'change'])
        ->name('users.change-password');

    Route::get('users/force_reset/{user}', [PasswordController::class,  'force_reset'])
        ->name('users.force_reset');
    Route::post('users/force_reset/{user}', [PasswordController::class,  'force_change'])
        ->name('users.force_change');

    Route::post('users/settings', [\App\Http\Controllers\User\SettingController::class, 'update'])
        ->name('users.settings');

    Route::get('users/inactive-users', [UsersController::class, 'inactives'])
        ->name('users.inactive-users');
    Route::post('users/inactive-users/{id}/restore', [UsersController::class, 'restore'])
        ->name('users.inactive-users.restore');
    Route::resource('users', UsersController::class);

    Route::resource('vips', \App\Http\Controllers\VipController::class)
        ->except('create', 'show');
});
