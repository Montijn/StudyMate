<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['firstname' => 'Mitchell', 'lastname' => 'Verweerden',
            'email' => 'm.verweerden@student.avans.nl',
            'role' => 'Admin',
            'password' => Hash::make('wachtwoord')
        ]);

        User::create(['firstname' => 'Montijn', 'lastname' => 'Bennik',
            'email' => 'ms.bennik@student.avans.nl',
            'role' => 'Admin',
            'password' => Hash::make('test1234')
        ]);

        User::create(['firstname' => 'Kerel', 'infix' => 'van', 'lastname' => 'Man',
            'email' => 'test@test.nl',
            'role' => 'Student',
            'password' => Hash::make('KerelMan123')
        ]);

        User::create(['firstname' => 'Karel', 'lastname' => 'Kees',
            'email' => 'test2@test.nl',
            'role' => 'Student',
            'password' => Hash::make('KeesKarel')
        ]);

        User::create(['firstname' => 'Jezus', 'infix' => 'van', 'lastname' => 'Nazareth',
            'email' => 'test3@test.nl',
            'role' => 'Student',
            'password' => Hash::make('christus2020')
        ]);

        User::create(['firstname' => 'Bruce', 'lastname' => 'Wayne',
            'email' => 'test4@test.nl',
            'role' => 'Student',
            'password' => Hash::make('BigMoney')
        ]);

        User::create(['firstname' => 'Ip', 'lastname' => 'Man',
            'email' => 'test5@test.nl',
            'role' => 'Student',
            'password' => Hash::make('BruceLee123')
        ]);
    }
}
