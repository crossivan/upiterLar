<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory()->create([
            'name' => 'admin',
            'role' => 'admin',
            'email' => 'crossivan@yandex.ru',
            'password' => bcrypt('1xz2Ktyflove')
        ]);

        User::factory()->create([
            'name' => 'Kodak',
            'role' => 'worker',
            'email' => 'lena.danil4ewa@yandex.ru',
            'password' => bcrypt('kodak')
        ]);

        User::factory()->create([
            'name' => 'Колибри',
            'role' => 'worker',
            'email' => 'kolibri_foto@mail.ru',
            'password' => bcrypt('kolibri')
        ]);
        User::factory()->create([
            'name' => 'Фламинго',
            'role' => 'worker',
            'email' => 'fotoub95@mail.ru',
            'password' => bcrypt('flamingo')
        ]);
        User::factory()->create([
            'name' => 'Позитифф',
            'role' => 'worker',
            'email' => 'guffyc1@yandex.ru',
            'password' => bcrypt('Positive')
        ]);
        User::factory()->create([
            'name' => 'Проспект',
            'role' => 'worker',
            'email' => 'prospektlenina17@yandex.ru',
            'password' => bcrypt('Prospekt')
        ]);
        User::factory()->create([
            'name' => 'Колорит',
            'role' => 'worker',
            'email' => '89876828282@mail.ru',
            'password' => bcrypt('Colorit')
        ]);

        User::factory(92)->create();
    }
}
