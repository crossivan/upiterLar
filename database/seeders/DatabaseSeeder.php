<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->create([
             'name' => 'admin',
             'role' => 'admin',
             'email' => 'crossivan@yandex.ru',
             'password' => bcrypt('1xz2Ktyflove')
         ]);

        \App\Models\User::factory()->create([
            'name' => 'Kodak',
            'role' => 'employee',
            'email' => 'lena.danil4ewa@yandex.ru',
            'password' => bcrypt('kodak')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Колибри',
            'role' => 'employee',
            'email' => 'kolibri_foto@mail.ru',
            'password' => bcrypt('kolibri')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Фламинго',
            'role' => 'employee',
            'email' => 'fotoub95@mail.ru',
            'password' => bcrypt('flamingo')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Позитифф',
            'role' => 'employee',
            'email' => 'guffyc1@yandex.ru',
            'password' => bcrypt('Positive')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Проспект',
            'role' => 'employee',
            'email' => 'prospektlenina17@yandex.ru',
            'password' => bcrypt('Prospekt')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Колорит',
            'role' => 'employee',
            'email' => '89876828282@mail.ru',
            'password' => bcrypt('Colorit')
        ]);

        \App\Models\User::factory(92)->create();
    }
}
