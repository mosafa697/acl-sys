<?php

namespace Database\Factories;

use App\Models\Method;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PermissionFactory extends Factory
{
    protected $model = Permission::class;

    public function definition()
    {
        return [
            'name' => $name = $this->faker->unique()->word . ' Permission',
            'slug' => Str::slug($name),
            'method_id' => Method::factory(),
        ];
    }
}