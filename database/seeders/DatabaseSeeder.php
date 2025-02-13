<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRoles;
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
        UserRoles::factory()->create(['roles' => 'admin']);
        UserRoles::factory()->create(['roles' => 'worker']);
        UserRoles::factory()->create(['roles' => 'user']);

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
            'password' => bcrypt('Kodak1')
        ]);

        User::factory()->create([
            'name' => 'Колибри',
            'role' => 'worker',
            'email' => 'kolibri_foto@mail.ru',
            'password' => bcrypt('Kolibri')
        ]);
        User::factory()->create([
            'name' => 'Фламинго',
            'role' => 'worker',
            'email' => 'fotoub95@mail.ru',
            'password' => bcrypt('Flamingo')
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
        User::factory()->create([
            'name' => 'Вася',
            'role' => 'user',
            'email' => 'vasa@mail.ru',
            'password' => bcrypt('1xz2Ktyflove')
        ]);

        User::factory(92)->create();


    }
}
