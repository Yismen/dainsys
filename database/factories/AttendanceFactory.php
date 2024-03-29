<?php

use App\Models\AttendanceCode;
use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Models\Attendance::class, function (Faker $faker) {
    return [
        'date' => $faker->date('Y-m-d'),
        'employee_id' => factory(Employee::class)->create(),
        'code_id' => factory(AttendanceCode::class)->create(),
        'user_id' => auth()->user() ? auth()->user()->id : factory(User::class)->create(),
        'comments' => $faker->text(150)
    ];
});
