<?php

namespace Tests\Feature\Employee;

use App\Models\Employee;
use App\Models\SocialSecurity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SocialSecurityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function employee_social_security_is_created()
    {
        $employee = create(Employee::class);
        $social_security = make(SocialSecurity::class)->toArray();

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.update-social-security', $employee->id), $social_security);
        $response->assertOk();
        $this->assertDatabaseHas('social_securities', array_merge($social_security, ['employee_id' => $employee->id]));
    }

    /** @test */
    public function employee_social_security_is_updated()
    {
        $social_security = create(SocialSecurity::class);
        $updated_attributes = [
            'number' => '99999999',
        ];

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.update-social-security', $social_security->employee->id), $updated_attributes);

        $response->assertOk();
        $this->assertDatabaseHas('social_securities', $updated_attributes);
    }

    /** @test */
    public function employee_social_security_data_is_validated()
    {
        $social_security = create(SocialSecurity::class);
        $updated_attributes = [
            'number' => '',
        ];

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.update-social-security', $social_security->employee->id), $updated_attributes);

        $response->assertInvalid(['number']);
    }
}
