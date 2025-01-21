<?php

namespace Database\Factories;

use App\Models\Control;
use App\Models\Method;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class MethodFactory extends Factory
{
    protected $model = Method::class;

    public function definition()
    {
        return [
            'name' => $name = $this->faker->unique()->word . ' Method',
            'slug' => Str::slug($name),
            'control_id' => Control::factory(),
        ];
    }
}