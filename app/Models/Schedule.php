<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Schedule extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    use Sluggable;

    protected $table = 'schedules';

    protected $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

    protected $fillable = ['employee_id', 'date', 'hours'];

    /**
     * Return the sluggable configuration array for this model.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'employee.fullName',
                'onUpdate' => true,
                'unique' => false,
            ],
        ];
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    protected function employeesList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn () => Employee::actives()
            ->orderBy('first_name')
            ->orderBy('second_first_name')
            ->orderBy('last_name')
            ->orderBy('second_last_name')
            ->get());
    }

    protected function date(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn ($date) => Carbon::parse($date));
    }

    public function createNew($data)
    {
        $data['days'] = empty($data['days']) ? 0 : $data['days'] - 1;
        $date = Carbon::parse($data['date']);
        $toDate = Carbon::parse($data['date'])->addDays($data['days']);

        while ($date <= $toDate) {
            try {
                $weekDay = strtolower($date->format('l'));
                $data['date'] = $date->format('Y-m-d');

                if (! $this->exists($data)) {
                    $shift = Shift::where('employee_id', $data['employee_id'])->first();
                    $data['hours'] = $shift->$weekDay;

                    $this->create($data);
                }

                $date->addDays(1);
            } catch (\Exception) {
                throw new \Exception('Invalid Data. Must pass a valid employee_id, date, hours', 423);
            }
        }
    }

    private function exists($data)
    {
        return $this->where('employee_id', $data['employee_id'])->where('date', $data['date'])->first();
    }
}
