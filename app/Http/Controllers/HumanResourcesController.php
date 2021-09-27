<?php

namespace App\Http\Controllers;

use App\Repositories\BirthdaysRepository;

class HumanResourcesController extends Controller
{

    public function birthdaysThisMonth()
    {
        $employees = BirthdaysRepository::thisMonth()->get();

        return view('human_resources.birthdays.list_monthly', compact('employees'))->with(['title' => __('Birthdays') . " " . __('This') . " " . __('Month')]);
    }

    public function birthdaysNextMonth()
    {
        $employees = BirthdaysRepository::nextMonth()->get();

        return view('human_resources.birthdays.list_monthly', compact('employees'))->with(['title' => __('Birthdays') . " " . __('Next') . " " . __('Month')]);
    }

    public function birthdaysLastMonth()
    {
        $employees = BirthdaysRepository::lastMonth()->get();

        return view('human_resources.birthdays.list_monthly', compact('employees'))->with(['title' => __('Birthdays') . " " . __('Last') . " " . __('Month')]);
    }
}
