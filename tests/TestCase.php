<?php

namespace Tests;

use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();
        // DB::statement('PRAGMA foreign_keys=on;');
        // $this->withExceptionHandling();
    }

    protected function signIn($user = null)
    {
        $user = $user ?: create('App\User');
        $this->actingAs($user);

        return $this;
    }

    // Hat tip, @adamwathan.
    protected function disableExceptionHandling()
    {
        $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);
        $this->app->instance(ExceptionHandler::class, new class() extends Handler
        {
            public function __construct()
            {
            }

            public function report(\Throwable $e)
            {
            }

            public function render($request, \Throwable $e)
            {
                throw $e;
            }
        });
    }

    protected function withExceptionHandling()
    {
        $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);

        $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);

        return $this;
    }

    protected function user(array $attributes = [])
    {
        $user = create('App\User', $attributes);

        return $user;
    }

    protected function userWithPermission($permit)
    {
        $user = create('App\User');
        $role = create('App\Role');
        $user->roles()->sync($role->id);
        $permission = create('App\Permission', ['name' => $permit]);
        $role->permissions()->sync($permission->id);

        return $user;
    }

    protected function userWithRole($role)
    {
        $user = create('App\User');
        $role = create('App\Role', ['name' => $role]);
        $user->roles()->sync($role->id);

        return $user;
    }

    protected function formAttributes($array = [])
    {
        return array_merge([
            'name' => $this->faker->name,
        ], $array);
    }
}
