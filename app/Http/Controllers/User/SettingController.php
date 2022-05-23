<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\EditUserSettings;
use App\Events\CreateUserSettings;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UserSetting         $setting
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $user = auth()->user();
        $settings = [
            'data' => json_encode(request()->only('layout', 'skin', 'sidebar', 'sidebar_mini')),
        ];

        if (!$user->settings) {
            $user->settings()->create($settings);
        } else {
            $user->settings()->update($settings);
        }

        Cache::flush();

        return back();
    }
}
