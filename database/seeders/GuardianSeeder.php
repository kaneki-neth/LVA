<?php

namespace Database\Seeders;

use App\Models\Guardian;
use Illuminate\Database\Seeder;

class GuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guardian::factory()
            ->count(10)
            ->create()
            ->each(function($guardian) {
                $guardian->students()->sync(rand(1, 10));
            });
    }
}
