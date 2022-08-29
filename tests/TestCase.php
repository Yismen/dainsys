<?php

namespace Tests;

use App\Exceptions\Handler;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();
        // DB::statement('PRAGMA foreign_keys=on;');
    }

    protected function signIn($user = null)
    {
        $user = $user ?: create('App\Models\User');
        $this->actingAs($user);

        return $this;
    }

    // Hat tip, @adamwathan.
    // protected function disableExceptionHandling()
    // {
    //     $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);
    //     $this->app->instance(ExceptionHandler::class, new class() extends Handler
    //     {
    //         public function __construct()
    //         {
    //         }

    //         public function report(\Throwable $e)
    //         {
    //         }

    //         public function render($request, \Throwable $e)
    //         {
    //             throw $e;
    //         }
    //     });
    // }

    // protected function withExceptionHandling()
    // {
    //     $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);

    //     $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);

    //     return $this;
    // }

    protected function mockRepo(string $class, $data, array $methods = [])
    {
        $methods = array_merge(['getData'], $methods);
        $this->partialMock($class, function ($mock) use ($data, $methods) {
            foreach ($methods as $method) {
                $mock
                ->shouldReceive($method)
                ->andReturn(['data' => $data]);
            }
        });
    }

    protected function user(array $attributes = [])
    {
        $user = create('App\Models\User', $attributes);

        return $user;
    }

    protected function userWithPermission($permit)
    {
        $user = create('App\Models\User');
        $role = create('App\Models\Role');
        $user->roles()->sync($role->id);
        $permission = create('App\Models\Permission', ['name' => $permit]);
        $role->permissions()->sync($permission->id);

        return $user;
    }

    protected function userWithRole($role)
    {
        $user = create('App\Models\User');
        $role = create('App\Models\Role', ['name' => $role]);
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
