<?php

namespace App\Http\Controllers\Api\V2;

use App\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class NotificationsController extends Controller
{
    /**
     * Notifications Unread
     *
     * Return a list of unread notifications for the authenticated user.
     *
     * @queryParam max_items integer Max amount of notifications to take. Default is 25.
     * @response 200 [
     *     {
     *         "id": "d8e62834-828a-482d-a279-bb113fcaaa53",
     *         "type": "App\\Notifications\\UserCreatedNotification",
     *         "notifiable_type": "App\\User",
     *         "notifiable_id": 1,
     *         "data": [],
     *         "read_at": null,
     *         "created_at": "2021-11-24T14:33:44.000000Z",
     *         "updated_at": "2021-11-24T14:33:44.000000Z"
     *     }
     * ]
     */
    public function unread()
    {
        $max_items = request()->max_items ?: 25;

        return auth()->user()->unreadNotifications()->take((int)$max_items)->get();
    }

    /**
     * Notifications Mark all as Read
     *
     * Cleans the unread notifications for the user
     *
     * @queryParam max_items integer Max amount of notifications to mark as read. Default is 25. This will also affect the amount of
     * unread notifications to return. Also, this will return the next batch of unread notifications for the authenticated user.
     * @response 200 [
     *     {
     *         "id": "d8e62834-828a-482d-a279-bb113fcaaa53",
     *         "type": "App\\Notifications\\UserCreatedNotification",
     *         "notifiable_type": "App\\User",
     *         "notifiable_id": 1,
     *         "data": [],
     *         "read_at": null,
     *         "created_at": "2021-11-24T14:33:44.000000Z",
     *         "updated_at": "2021-11-24T14:33:44.000000Z"
     *     }
     * ]
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

    /**
     * Notification Details
     *
     * Show details for a user notification. This will also mark the given notification as read.
     *
     * @urlParam notification string Uuid of the stored notification
     * @response {
     *      "id": "d8e62834-828a-482d-a279-bb113fcaaa53",
     *      "type": "App\\Notifications\\UserCreatedNotification",
     *      "notifiable_type": "App\\User",
     *      "notifiable_id": 1,
     *      "data": "[]",
     *      "read_at": "2021-12-01T22:29:34.797992Z",
     *      "created_at": "2021-11-24T14:33:44.000000Z",
     *      "updated_at": "2021-12-01T22:29:34.000000Z"
     *  }
     */
    public function show(Notification $notification)
    {
        $notification->markAsRead();

        Cache::flush();

        return $notification;
    }
}
