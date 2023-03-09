<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __invoke()
    {
        $features = collect([
            [
                'title' => 'Authentication',
                'text' => 'Some parts of the application are for the public to see, but sensitive data in restricted to authenticated users only.',
                'icon' => '<i class="fa fa-users"></i>',
            ],
            [
                'title' => 'Roles Access Level',
                'text' => 'Grant access based on user roles. Show only relevant and pertinent information for the current user while protecting sensitive data.',
                'icon' => '<i class="fa fa-id-card"></i>',
            ],
            [
                'title' => 'Permissions Resctrictions',
                'text' => 'Restrict access to perform actions with the data based on user permissions. You may be able to view data, but not to edit it.',
                'icon' => '<i class="fa fa-key"></i>',
            ],
            [
                'title' => 'User Notifications And Emails',
                'text' => 'Be notified when certain events hapen in the application. Subscribe to reports and channels and receive emails or notifications regularly.',
                'icon' => '<i class="fa fa-bell"></i>',
            ],
            [
                'title' => 'Scheduled Tasks and Reports',
                'text' => 'We can create tasks to be run in the application and reports to be sent out automatically at desired dates and time.',
                'icon' => '<i class="fa fa-tasks"></i>',
            ],
            [
                'title' => 'File downlaods',
                'text' => 'Configure what fields should be included and download your updated data any time.',
                'icon' => '<i class="fa fa-download"></i>',
            ],
        ]);

        return view('home', compact('features'));
    }
}
