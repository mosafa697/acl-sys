<?php

namespace Database\Factories;

use App\Models\Control;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ControlFactory extends Factory
{
    protected $model = Control::class;

    public function definition()
    {
        return [
            'name' => $name = $this->faker->unique()->word . ' Control',
            'slug' => Str::slug($name),
        ];
    }
}