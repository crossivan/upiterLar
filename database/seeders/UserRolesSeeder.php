<?php

namespace Database\Seeders;

use App\Models\UserRoles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRoles::factory()->create(['roles' => 'admin']);
        UserRoles::factory()->create(['roles' => 'worker']);
        UserRoles::factory()->create(['roles' => 'user']);
    }
}
