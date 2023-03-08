<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class AppComposer
{
    private $user;

    public function __construct()
    {
        $this->user = $this->user();
    }

    public function compose(View $view)
    {
        return $view->with([
            'logged' => $this->user,
            'user' => $this->user,
            'user_notifications' => $this->userNotifications(),
            'user_notifications_count' => $this->userNotificationsCount(),
            'app_name' => ucwords(config('dainsys.app_name', 'Dainsys')),
            'client_name' => ucwords(config('dainsys.client_name', 'Dainsys\' Client')),
            'client_name_mini' => strtoupper(config('dainsys.client_name_mini', 'DAINSYS')),
            'settings' => $this->settings(),
            'color' => $this->color(),
        ]);
    }

    private function user()
    {
        if (auth()->check()) {
            $this->user = auth()->user();

            return Cache::rememberForEver('user-' . $this->user->id, function () {
                return $this->user
                    ->load([
                        'settings',
                        'roles' => function ($query) {
                            return $query->orderBy('name')
                                ->with(['menus' => function ($query) {
                                    return $query->orderBy('display_name');
                                },
                                ]);
                        },
                    ]);
            });
        }

        return null;
    }

    private function userNotifications()
    {
        if ($this->user) {
            return Cache::rememberForEver('user-notifications-' . $this->user->id, function () {
                return $this->user->unreadNotifications()->take(10)->get();
            });
        }

        return null;
    }

    private function userNotificationsCount(): int
    {
        if ($this->user) {
            return Cache::rememberForEver('user-notifications-count-' . auth()->user()->id, function () {
                return auth()->user()->unreadNotifications()->count();
            });
        }

        return 0;
    }

    private function settings()
    {
        return $this->user && $this->user->settings ? json_decode($this->user->settings->data) : null;
    }

    private function color()
    {
        $settings = $this->settings();

        $skin = $settings && isset($settings->skin) ?
            explode('-', $settings->skin) :
            explode('-', config('dainsys.layout_color'));

        return is_array($skin) && count($skin) > 1 ?
            $skin[1] :
            $skin;
    }
}
