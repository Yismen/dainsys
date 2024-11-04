<?php

namespace Tests\Unit;

use App\Models\Employee;
use Tests\TestCase as TestsTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeMutatorsTest extends TestsTestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_sets_first_name_as_headline()
    {
        $inputName = ' first name ';
        $parsedName = 'First Name';
        $employee = create(Employee::class, [
            'first_name' => $inputName
        ]);

        $this->assertDatabaseHas(Employee::class, [
            'first_name' => $parsedName
        ]);

        $this->assertEquals($employee->first_name, $parsedName);
    }

    /** @test */
    public function it_sets_second_first_name_as_headline()
    {
        $inputName = ' second first     name ';
        $parsedName = 'Second First Name';
        $employee = create(Employee::class, [
            'second_first_name' => $inputName
        ]);

        $this->assertDatabaseHas(Employee::class, [
            'second_first_name' => $parsedName
        ]);

        $this->assertEquals($employee->second_first_name, $parsedName);
    }

    /** @test */
    public function it_sets_last_name_as_headline()
    {
        $inputName = ' last name ';
        $parsedName = 'Last Name';
        $employee = create(Employee::class, [
            'last_name' => $inputName
        ]);

        $this->assertDatabaseHas(Employee::class, [
            'last_name' => $parsedName
        ]);

        $this->assertEquals($employee->last_name, $parsedName);
    }

    /** @test */
    public function it_sets_second_last_name_as_headline()
    {
        $inputName = ' second last     name ';
        $parsedName = 'Second Last Name';
        $employee = create(Employee::class, [
            'second_last_name' => $inputName
        ]);

        $this->assertDatabaseHas(Employee::class, [
            'second_last_name' => $parsedName
        ]);

        $this->assertEquals($employee->second_last_name, $parsedName);
    }
}
