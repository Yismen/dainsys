<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('date_calc', ['as' => 'date_calc.index', 'uses' => 'DateCalcController@index']);
Route::get('date_calc/from_today', ['as' => 'date_calc.diff_from_today', 'uses' => 'DateCalcController@diffFromToday']);
Route::get('date_calc/range_diff', ['as' => 'date_calc.range_diff', 'uses' => 'DateCalcController@rangeDiff']);

Route::get('/', 'HomeController@welcome');
Auth::routes(['register' => false]);

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@admin');

    Route::get('/mark-all-notifications-as-read', 'AdminController@markAllNotificationsAsReadForUser')
        ->name('mark-all-notifications-as-read');

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

    Route::get('bhcs_manager', 'BlackHawkCS\ManagementController@index');
    Route::get('blackhawk_cs/api/dashboard/management', 'BlackHawkCS\ManagementController@dashboard');
    Route::get('bhcs_supervisor', 'BlackHawkCS\SupervisorController@index');
    Route::get('blackhawk_cs/api/dashboard/supervisor', 'BlackHawkCS\SupervisorController@dashboard');
    Route::get('/blackhawk/de', 'Blackhawk\DE\ManagementController@dashboard');

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

    Route::resource('escalations_clients', 'EscalClientsController');
    Route::resource('escalations_records', 'EscalRecordsController', ['except' => ['show']]);
    Route::get('api/escalations_records/clients', 'EscalRecordsController@getClients');
    Route::post('escalations_records/search', 'EscalRecordsController@search');
    Route::post('api/escalations_records/search', 'EscalRecordsController@search');
    Route::resource('api/escalations_records_api', 'EscalRecordsController', ['except' => ['show']]);
    Route::get('escalations_admin', 'EscalationsAdminController@index');
    Route::post('escalations_admin/api', 'EscalationsAdminController@index_ajax');
    Route::get('escalations_admin/by_date', 'EscalationsAdminController@getByDate');
    Route::get('escalations_admin/by_range', 'EscalationsAdminController@getByRange');
    Route::post('escalations_admin/by_date', 'EscalationsAdminController@postByDate');
    Route::post('escalations_admin/by_range', 'EscalationsAdminController@postByRange');
    Route::get('escalations_admin/search', 'EscalationsAdminController@search');
    Route::post('escalations_admin/search', 'EscalationsAdminController@handleSearch');
    Route::get('escalations_admin/random', 'EscalationsAdminController@random');
    Route::post('escalations_admin/random', 'EscalationsAdminController@handleRandom');
    Route::get('escalations_admin/bbbs', 'EscalationsAdminController@bbbs');
    Route::post('escalations_admin/bbbs', 'EscalationsAdminController@handleBBBs');
    Route::get('escalations_admin/bbbs_range', 'EscalationsAdminController@bbbs');
    Route::post('escalations_admin/bbbs_range', 'EscalationsAdminController@handleBBBsRange');
    Route::get('escalations_hours/by_date', 'EscalationsHoursController@byDate')->name('escalations_hours.byDate');
    Route::post('escalations_hours/search', 'EscalationsHoursController@search')->name('escalations_hours.search');
    Route::get('escalations_hours/create/{user_id}/{client_id}/{records}', 'EscalationsHoursController@create')->name('escalations_hours.create');
    Route::resource('escalations_hours', 'EscalationsHoursController', ['except' => 'create']);

    Route::resource('holidays', 'HolidayController')
        ->except('show');

    Route::group(['middleware' => 'authorize:view-human-resources-dashboard'], function () {
        Route::get('human_resources/employees/dgt3', 'HumanResources\DGT3Controller@dgt3')->name('human_resources.dgt3.index');
        Route::post('human_resources/employees/dgt3', 'HumanResources\DGT3Controller@handleDgt3')->name('human_resources.dgt3.show');
        Route::get('human_resources/employees/dgt3_to_excel/{year}', 'HumanResources\DGT3Controller@dgt3ToExcel')->name('human_resources.dgt3.download');

        Route::get('human_resources/employees/dgt4', 'HumanResources\DGT4Controller@dgt4')->name('human_resources.dgt4.index');
        Route::post('human_resources/employees/dgt4', 'HumanResources\DGT4Controller@handleDgt4')->name('human_resources.dgt4.show');
        Route::get('human_resources/employees/dgt4_to_excel/{year}/{month}', 'HumanResources\DGT4Controller@dgt4ToExcel')->name('human_resources.dgt4.month.download');
        Route::get('human_resources/employees/dgt4_to_excel/{year}', 'HumanResources\DGT4Controller@dgt3ToExcel')->name('human_resources.dgt4.download');

        Route::get('human_resources/birthdays/this_month', 'HumanResources\BirthdaysController@birthdaysThisMonth')->name('birthdays_this_month');
        Route::get('human_resources/birthdays/next_month', 'HumanResources\BirthdaysController@birthdaysNextMonth')->name('birthdays_next_month');
        Route::get('human_resources/birthdays/last_month', 'HumanResources\BirthdaysController@birthdaysLastMonth')->name('birthdays_last_month');
    });

    Route::get('imports', 'ImportsController@home'); // Remove

    Route::get('imports/employees', 'ImportsController@employees');
    Route::post('imports/employees', ['as' => 'admin.imports.employees', 'uses' => 'ImportsController@handleImportEmployees']);

    Route::get('imports/performances', 'ImportsController@performances');
    Route::post('imports/performances', ['as' => 'admin.imports.performances', 'uses' => 'ImportsController@importPerformances']);

    Route::get('login_names/to-excel/all', 'LoginNamesController@toExcel')->name('login_names.to-excel.all');
    Route::get('login_names/to-excel/all-employees', 'LoginNamesController@employeesToExcel')->name('login_names.to-excel.all-employees');
    Route::resource('login_names', 'LoginNamesController');

    Route::resource('menus', 'MenusController');

    Route::post('nationalities/employees', 'NationalitiesController@assignEmployees')->name('nationalities.assign-employees');
    Route::resource('nationalities', 'NationalitiesController');

    Route::post('import_overnight_hours', 'ImportOvernightHourController@store')
        ->name('import_overnight_hours.store');
    Route::resource('overnight_hours', 'OvernightHourController')
        ->except('show');

    Route::resource('payment_frequencies', 'PaymentFrequenciesController');

    Route::bind('payment_type', function ($id) {
        return App\PaymentType::whereId($id)
            ->firstOrFail();
    });

    Route::resource('payment_types', 'PaymentTypesController');

    Route::resource('payroll-additional-concepts', 'PayrollAdditionalConceptsController', ['except' => ['show', 'destroy']]);

    Route::get('/payroll-additionals/by-date/{date}', 'PayrollAdditionalsController@byDate')->name('payroll-additionals.by-date');
    Route::get('/payroll-additionals/import', 'PayrollAdditionalsController@import')->name('payroll-additionals.import');
    Route::post('/payroll-additionals/import', 'PayrollAdditionalsController@handleImport')->name('payroll-additionals.handle-import');
    Route::get('/payroll-additionals/date/{date}/employee/{employee_id}', 'PayrollAdditionalsController@details')->name('payroll-additionals.details');

    Route::resource('payroll-additionals', 'PayrollAdditionalsController');

    Route::resource('payroll-discount-concepts', 'PayrollDiscountConceptsController', ['except' => ['show', 'destroy']]);

    Route::get('/payroll-discounts/by-date/{date}', 'PayrollDiscountsController@byDate')->name('payroll-discounts.by-date');
    Route::get('/payroll-discounts/import', 'PayrollDiscountsController@import')->name('payroll-discounts.import');
    Route::post('/payroll-discounts/import', 'PayrollDiscountsController@handleImport')->name('payroll-discounts.handle-import');
    Route::get('/payroll-discounts/date/{date}/employee/{employee_id}', 'PayrollDiscountsController@details')->name('payroll-discounts.details');

    Route::resource('payroll-discounts', 'PayrollDiscountsController');

    Route::resource('payroll-incentive-concepts', 'PayrollIncentiveConceptsController', ['except' => ['show', 'destroy']]);

    Route::get('/payroll-incentives/by-date/{date}', 'PayrollIncentivesController@byDate')->name('payroll-incentives.by-date');
    Route::get('/payroll-incentives/import', 'PayrollIncentivesController@import')->name('payroll-incentives.import');
    Route::post('/payroll-incentives/import', 'PayrollIncentivesController@handleImport')->name('payroll-incentives.handle-import');
    Route::get('/payroll-incentives/date/{date}/employee/{employee_id}', 'PayrollIncentivesController@details')->name('payroll-incentives.details');

    Route::resource('payroll-incentives', 'PayrollIncentivesController');

    Route::get('payrolls/import_from_excel', 'Payroll\SummaryController@importDataFromExcel');
    Route::post('payrolls/import_from_excel', 'Payroll\SummaryController@postImportDataFromExcel');
    Route::get('payrolls/by_payroll_id/{payroll_id}', 'Payroll\SummaryController@byPayrollID')->name('payrolls.by_payroll_id');

    Route::get('payrolls/generate', 'Payroll\GenerateController@generate')->name('payrol.generate');
    Route::post('payrolls/generate', 'Payroll\GenerateController@handleGenerate');

    Route::get('payrolls/prepare', 'Payroll\GenerateController@prepare');
    Route::post('payrolls/filter-positions-by-department', 'Payroll\GenerateController@filterPositionsByDepartment');

    Route::post('payrolls/generate/filter', 'Payroll\GenerateController@filter');
    Route::post('payrolls/close', 'Payroll\GenerateController@close');

    Route::resource('payrolls', 'Payroll\PayrollController');

    Route::get('payrolls_summary/import_from_excel', 'Payroll\SummaryController@importDataFromExcel');
    Route::post('payrolls_summary/import_from_excel', 'Payroll\SummaryController@postImportDataFromExcel');
    Route::get('payrolls_summary/by_payroll_id/{payroll_id}', 'Payroll\SummaryController@byPayrollID')->name('admin.payrolls_summary.by_payroll_id');
    Route::resource('payrolls_summary', 'Payroll\SummaryController', [
        'except' => ['edit', 'create']
    ]);

    Route::get('performances_import/by_date/{perf_date}', 'PerformanceImportController@show')->name('performances_import.by_date');
    Route::get('/performances_import/mass_delete', 'PerformanceImportController@confirmDestroy');
    Route::resource('performances_import', 'PerformanceImportController')->except(['show', 'edit', 'update']);
    // Route::get('performances/by_date/{perf_date}', 'PerformanceController@byDate')->name('performances.by_date');
    // Route::delete('performances/mass_delete', 'PerformanceController@wantsMassDelete')->name('performances.mass_delete');
    Route::resource('performances', 'PerformanceController')
        ->except('create', 'store');

    Route::resource('downtimes', 'DowntimeController')
        ->except('show');
    Route::resource('permissions', 'PermissionsController');

    Route::resource('positions', 'PositionsController');

    Route::post('profiles/image/{id}', ['as' => 'profiles.image', 'uses' => 'ProfileController@postImage']);
    Route::resource('profiles', 'ProfileController', ['except' => 'destroy']);

    Route::post('projects/employees', 'ProjectsController@assignEmployees');
    Route::resource('projects', 'ProjectsController');

    Route::resource('punches', 'PunchesController');

    Route::resource('quality_scores', 'Quality\ScoreController');

    Route::resource('revenue_types', 'RevenueTypesController');

    Route::resource('roles', 'RolesController');

    Route::resource('schedules', 'SchedulesController');

    Route::resource('shifts', 'ShiftsController');

    Route::post('sites/employees', 'SitesController@assignEmployees');

    Route::resource('sites', 'SitesController');
    // Route::bind('social_security', function($id){
    //     return App\SocialSecurity::findOrFail($id);
    // });

    // Route::resource('social_securitie', 'SocialSecurityController');

    Route::resource('supervisor_users', 'SupervisorUserController');

    Route::post('supervisors/employees', 'SupervisorsController@assignEmployees');

    Route::resource('supervisors', 'SupervisorsController')->except('destroy');

    Route::resource('termination_reasons', 'TerminationReasonController')->except(['destroy']);

    Route::resource('termination_types', 'TerminationTypeController')->except(['destroy']);

    Route::resource('universals', 'UniversalController')
        ->except('create', 'show');

    Route::get('users/search', 'Partials\UserController');

    Route::get('users/reset', 'User\PasswordController@reset')->name('users.reset');
    Route::post('users/reset', 'User\PasswordController@change')->name('users.change');

    Route::get('users/force_reset/{user}', 'User\PasswordController@force_reset')->name('users.force_reset');
    Route::post('users/force_reset/{user}', 'User\PasswordController@force_change')->name('users.force_change');

    Route::post('users/update_settings/{user}', 'User\SettingController@updateSettings')->name('users.update_settings');
    Route::put('users/settings/{user}', 'User\SettingController@update')->name('users.settings');

    Route::get('users/inactive-users', 'UsersController@inactives')->name('users.inactive-users');
    Route::post('users/inactive-users/{id}/restore', 'UsersController@restore')->name('users.inactive-users.restore');

    Route::resource('users', 'UsersController');

    Route::resource('vips', 'VipController')
        ->except('create', 'show');
});
