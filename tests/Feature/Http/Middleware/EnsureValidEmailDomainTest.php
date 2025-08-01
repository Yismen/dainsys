<?php

namespace Tests\Feature\Http\Middleware;

use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Middleware\EnsureValidEmailDomain;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EnsureValidEmailDomainTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        app()->detectEnvironment(fn () => 'production');
        config(['app.valid_email_domains' => 'gmail.com,yahoo.com']);

        Route::middleware(\App\Http\Middleware\EnsureValidEmailDomain::class)
            ->get('/test-env', fn () => response('ok'));
    }

    /** @test */
    public function it_only_validates_emails_in_production()
    {
        app()->detectEnvironment(fn () => 'testing');
        $response = $this->get('/test-env');

         $response->assertOk();
    }

    /** @test */
    public function guests_get_unauthorized_response()
    {
        $response = $this->get('/test-env');

         $response->assertUnauthorized();
    }

    /** @test */
    public function it_throws_exception_if_domains_are_not_configure()
    {
        config(['app.valid_email_domains' => null]);

        $this->actingAs($this->user(['email' => 'any@gmail.com']));

        $response = $this->get('/test-env');

        $response
            ->assertForbidden()
            ->assertSeeText('No valid email domains configured');
    }

    /** @test */
    public function users_with_invalid_domain_get_unauthorized_request()
    {
        $this->actingAs($this->user(['email' => 'any@invalid_domain.com']));

        $response = $this->get('/test-env');

         $response->assertForbidden();
         $response->assertSeeText('Email domain invalid_domain.com not accepted');
    }

    /** @test */
    public function users_with_valid_email_domain_are_authorized()
    {
        config(['app.valid_email_domains' => 'gmail.com,yahoo.com']);

        $this->actingAs($this->user(['email' => 'any@gmail.com']));

        $response = $this->get('/test-env');

         $response->assertOk();
    }
}
