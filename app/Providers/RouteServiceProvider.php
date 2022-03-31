<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    // protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });

        $this->configureRoutesModelBindings();
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }

    /**
     * Configure the Route Model Bindings.
     *
     * @return void
     */
    public function configureRoutesModelBindings()
    {
        Route::bind('afp', function ($id) {
            return \App\Afp::with(['employees' => function ($query) {
                return $query->actives()
                    ->sorted();
            }])
                ->findOrFail($id);
        });

        Route::bind('arss', function ($id) {
            return \App\Ars::with(['employees' => function ($query) {
                return $query->actives()
                    ->sorted();
            }])
                ->findOrFail($id);
        });

        Route::bind('attendance', function ($id) {
            return \App\Attendance::with(['employee', 'user', 'attendance_code'])
                ->findOrFail($id);
        });

        Route::bind('campaign', function ($id) {
            return \App\Campaign::with(['project', 'revenueType'])
                ->findOrFail($id);
        });

        Route::bind('card', function ($card) {
            return \App\Card::whereCard($card)
                ->with('employee')
                ->firstOrFail();
        });

        Route::bind('department', function ($id) {
            return \App\Department::whereId($id)
                ->with(['positions' => function ($query) {
                    $query->orderBy('name');
                }])
                ->with(['employees' => function ($query) {
                    return $query->actives()
                        ->sorted();
                }])
                ->firstOrFail();
        });

        Route::bind('downtime_reason', function ($id) {
            return \App\DowntimeReason::with('hours:id,downtime_reason_id,login_time,reported_by')
                ->findOrFail($id);
        });

        Route::bind('employee', function ($id) {
            return \App\Employee::whereId($id)
                ->with('address')
                ->with('afp')
                ->with('ars')
                ->with('bankAccount.bank')
                ->with('socialSecurity')
                ->with('card')
                ->with('gender')
                ->with('loginNames')
                ->with('marital')
                ->with('nationality')
                ->with('punch')
                ->with('position')
                ->with('project')
                ->with(['termination' => function ($query) {
                    return $query->with(['terminationType', 'terminationReason']);
                }])
                ->with('supervisor')
                ->with('site')
                ->with('changes')

                ->firstOrFail()
                ->append([
                    'ars_list',
                    'afp_list',
                    'banks_list',
                    'departments_list',
                    'genders_list',
                    'has_kids_list',
                    'maritals_list',
                    'positions_list',
                    'projects_list',
                    'payment_types_list',
                    'payment_frequencies_list',
                    'nationalities_list',
                    'sites_list',
                    'supervisors_list',
                    'termination_type_list',
                    'termination_reason_list',
                    'is_universal',
                    'is_vip',
                ]);
        });

        Route::bind('hour', function ($id) {
            return \App\Hour::whereId($id)
                ->with(['employees' => function ($query) {
                    return $query->sorted();
                }])
                ->firstOrFail();
        });

        Route::bind('login_name', function ($login_name) {
            return \App\LoginName::with('employee')
                ->findOrFail($login_name);
        });

        Route::bind('menu', function ($id) {
            return \App\Menu::with('roles')
                ->findOrFail($id)
                ->append('roles-list');
        });

        Route::bind('message', function ($id) {
            return \App\Message::whereId($id)
                ->with('user')
                ->firstOrFail();
        });

        Route::bind('nationality', function ($id) {
            return \App\Nationality::with(['employees' => function ($query) {
                return $query->actives()
                    ->sorted()
                    ->with('position');
            }])->findOrFail($id);
        });

        Route::bind('payment_type', function ($id) {
            return \App\PaymentType::whereId($id)
                ->firstOrFail();
        });

        Route::bind('performance', function ($id) {
            return \App\Performance::with('employee.supervisor', 'campaign.project', 'supervisor', 'downtimeReason')
                ->orderBy('date')
                ->orderBy('updated_at')
                ->findOrFail($id);
        });

        Route::bind('permission', function ($name) {
            return \App\Permission::whereName($name)
                ->with('roles')
                ->firstOrFail()->append('roles-list');
        });

        Route::bind('position', function ($id) {
            return \App\Position::whereId($id)
                ->with('department')
                ->with(['employees' => function ($query) {
                    return $query->actives()
                        ->orderBy('site_id')
                        ->orderBy('project_id')
                        ->sorted()
                        ->with(['site', 'supervisor', 'project']);
                }])
                ->with('payment_type')
                ->with('payment_frequency')
                ->firstOrFail();
        });

        Route::bind('project', function ($id) {
            return \App\Project::with(['employees' => function ($query) {
                return $query->actives()
                    ->sorted();
            }])
                ->findOrFail($id);
        });

        Route::bind('punch', function ($punches) {
            return \App\Punch::wherePunch($punches)
                ->with('employee')
                ->firstOrFail();
        });

        Route::bind('role', function ($role) {
            return \App\Role::whereName($role)
                ->with(['permissions' => function ($query) {
                    $query->orderBy('resource');
                }])
                ->with(['users' => function ($query) {
                    $query->orderBy('name');
                }])
                ->with(['menus' => function ($query) {
                    $query->orderBy('display_name');
                }])
                ->firstOrFail();
        });

        Route::bind('supervisor', function ($id) {
            return \App\Supervisor::whereId($id)
                ->with(['employees' => function ($query) {
                    return $query->actives()
                        ->sorted()
                        ->with('position.department');
                }])
                ->firstOrFail();
        });

        Route::bind('site', function ($id) {
            return \App\Site::with(['employees' => function ($query) {
                return $query->actives()
                    ->sorted();
            }])
                ->findOrFail($id);
        });

        Route::bind('user', function ($id) {
            return \App\User::whereId($id)
                ->with('roles.permissions')
                ->with('settings')
                ->firstOrFail()->append('roles-list');
        });
    }
}
