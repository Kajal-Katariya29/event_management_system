<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organizer;

class OrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organizer::factory()->count(10)->create();
    }
}
