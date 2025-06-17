<?php

namespace Database\Factories;

use App\Models\AttendanceCode;
use App\Models\Employee;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends \Illuminate\Database\Eloquent\Factories\Factory
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $model = \App\Models\Attendance::class;

    public function definition()
    {
        return [
            'date' => fake()->date('Y-m-d'),
            'employee_id' => Employee::factory()->create(),
            'code_id' => AttendanceCode::factory()->create(),
            'user_id' => auth()->user() ? auth()->user()->id : User::factory()->create(),
            'comments' => fake()->text(150),
        ];
    }
}
