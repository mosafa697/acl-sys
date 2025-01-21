<?php

namespace Database\Seeders;

use App\Models\Control;
use App\Models\Method;
use App\Models\Permission;
use App\Models\Group;
use Illuminate\Database\Seeder;

class CombinedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $controls = Control::factory()->count(5)->create();

        $methods = Method::factory()->count(10)->create([
            'control_id' => function () use ($controls) {
                return $controls->random()->id;
            },
        ]);

        Permission::factory()->count(20)->create([
            'method_id' => function () use ($methods) {
                return $methods->random()->id;
            },
        ]);

        Group::factory()->count(3)->create();
    }
}