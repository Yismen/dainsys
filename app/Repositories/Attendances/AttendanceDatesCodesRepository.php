<?php

namespace App\Repositories\Attendances;

use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceDatesCodesRepository
{
    protected $current_user;

    protected $date;

    protected $code;

    /**
     * Return data and dates for all attendances for a given date
     *
     * @param  Carbon\date  $date
     * @param  bool  $current_user  false to query data for all users
     */
    public function __construct(Carbon $date, int $code, bool $current_user = true)
    {
        $this->current_user = $current_user === true ? auth()->user()->id : '%';

        $this->date = $date;
        $this->code = $code;
    }

    public function data()
    {
        return Attendance::query()
            ->with('employee')
            ->whereHas('employee', function ($query): void {
                $query->whereDate('date', $this->date)
                    ->where('code_id', $this->code)
                    ->where('user_id', 'like', $this->current_user);
            })
            ->get();
    }

    public function dates()
    {
        return Attendance::groupBy('date')
            ->select('date')
            ->where('user_id', $this->current_user)
            ->limit(50)
            ->latest('date')
            ->get();
    }
}
