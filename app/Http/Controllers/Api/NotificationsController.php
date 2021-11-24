<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Support\Facades\Cache;

class NotificationsController extends Controller
{
    /**
     * Return a list of unread notifications for the authenticated user.
     * 
     * @queryParam max_items int Max amount of notifications to take. Default is 25.
     * @return Notification
     */
    public function unread()
    {
        $max_items = request()->max_items ?: 25;

        return auth()->user()->unreadNotifications()->take((int)$max_items)->get();
    }

    /**
     * Cleans the unread notifications for the user
     *
     * @queryParam max_items int Max amount of notifications to mark as read. Default is 25. This will also affect the amount of 
     * unread notifications to return.
     * @return void
     */
    public function markAllAsRead()
    {
        $max_items = request()->max_items ?: 25;

        foreach (auth()->user()->unreadNotifications()->take((int)$max_items)->get() as $notification) {
            $notification->markAsRead();
        }

        Cache::flush();

        return $this->unread();
    }

    public function show(Notification $notification)
    {
        $notification->markAsRead();

        Cache::flush();

        return $notification;
    }
}
