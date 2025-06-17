<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function signIn($user = null)
    {
        $user = $user ?: create(\App\Models\User::class);
        $this->actingAs($user);

        return $this;
    }

    protected function mockRepo(string $class, $data, array $methods = [])
    {
        $methods = array_merge(['getData'], $methods);
        $this->partialMock($class, function ($mock) use ($data, $methods): void {
            foreach ($methods as $method) {
                $mock
                ->shouldReceive($method)
                ->andReturn(['data' => $data]);
            }
        });
    }

    protected function user(array $attributes = [])
    {
        $user = create(\App\Models\User::class, $attributes);

        return $user;
    }

    protected function userWithPermission($permit)
    {
        $user = create(\App\Models\User::class);
        $role = create(\App\Models\Role::class);
        $user->roles()->sync($role->id);
        $permission = create(\App\Models\Permission::class, ['name' => $permit]);
        $role->permissions()->sync($permission->id);

        return $user;
    }

    protected function userWithRole($role)
    {
        $user = create(\App\Models\User::class);
        $role = create(\App\Models\Role::class, ['name' => $role]);
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
