<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Menu extends Model
{
    protected $fillable = ['name', 'display_name', 'description', 'icon'];

    protected $guarded = [];

    /**
     * a module belongs to many roles
     *
     * @return [type] [description]
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    protected function rolesList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function () {
            return $roles = Role::pluck('name', 'id')->toArray();
        });
    }

    protected function displayName(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($display_name) {
            return $this->attributes['display_name'] = ucwords($display_name);
            return ['display_name' => ucwords($display_name)];
        });
    }

    public function addMenu($request)
    {
        $name = $this->parseName($request);

        if ($exists = $this->where('name', $request->name)->get()) {
            foreach ($exists as $model) {
                $model->delete();
            }
        }
        $request->only(['name', 'display_name', 'description', 'icon']);

        $menu = $this->create($request->only(['name', 'display_name', 'description', 'icon']));

        $this->createPermissions($name);

        Cache::forget('menus');

        $menu->roles()->sync((array) $request->roles);

        return $menu;
    }

    public function updateMenu($request)
    {
        $name = $this->parseName($request);

        $this->update($request->only(['name', 'display_name', 'description', 'icon']));

        Cache::forget('menus');

        $this->roles()->sync((array) $request->roles);

        return $this;
    }

    public function removeMenu()
    {
        $this->delete();

        Cache::forget('menus');

        $name = Str::startsWith($this->name, 'admin/') ?
            strtolower(explode('admin/', $this->name, 2)[1]) :
            $this->name;

        $permissions = Permission::where('resource', $name)->get();

        foreach ($permissions as $permission) {
            $permission->delete();
        }
    }

    private function parseName($request)
    {
        $name = $this->stripAdmin($this->prepareName($request->name));

        $request->merge(['name' => $name]);

        if ($request->is_admin) {
            $request->merge(['name' => 'admin/' . $request->name]);
        }

        return $name;
    }

    private function prepareName($name)
    {
        return strtolower(trim(preg_replace("/\.|\/\//", '/', $name)));
    }

    private function stripAdmin($name)
    {
        if (Str::startsWith($name, 'admin/')) {
            return explode('admin/', $name, 2)[1];
        }

        return $name;
    }

    private function createPermissions($name)
    {
        $names = ['create', 'view', 'edit', 'destroy'];

        foreach ($names as $value) {
            $new_name = $value . '-' . $name;

            if (! Permission::where('name', $new_name)->first()) {
                Permission::create([
                    'name' => $new_name,
                    'resource' => $name,
                ]);
            }
        }
    }
}
