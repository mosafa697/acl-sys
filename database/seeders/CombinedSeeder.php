<?php

namespace Database\Seeders;

use App\Models\Control;
use App\Models\Method;
use App\Models\Permission;
use App\Models\User;
use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CombinedSeeder extends Seeder
{
    public function run()
    {
        $controllers = [
            'User' => ['index', 'store', 'update', 'destroy'],
            'User Permission' => ['update', 'edit'],
            'Group' => ['index', 'store', 'update', 'destroy'],
            'Group Permission' => ['assign'],
            'Permission' => ['index', 'store', 'update', 'destroy'],
        ];

        $controls = [];
        foreach ($controllers as $controller => $methods) {
            $control = Control::factory()->create([
                'name' => $controller,
                'slug' => Str::slug($controller),
            ]);
            $controls[] = $control;

            foreach ($methods as $method) {
                Method::factory()->create([
                    'name' => $method,
                    'slug' => Str::slug($method),
                    'control_id' => $control->id,
                ]);
            }
        }

        $methods = Method::all();
        $permissions = [];
        foreach ($methods as $method) {
            $permission = Permission::factory()->create([
                'name' => $method->name . '-' . $method->control->slug,
                'slug' => $method->control->slug . '@' . $method->slug,
                'method_id' => $method->id,
            ]);
            $permissions[] = $permission;
        }

        $users = User::factory()->count(5)->create();

        $users->each(function ($user) use ($permissions) {
            $user->permissions()->attach(
                collect($permissions)->random(rand(0, 5))->pluck('id')->toArray()
            );
        });

        Group::factory()->count(3)->create();
    }
}
