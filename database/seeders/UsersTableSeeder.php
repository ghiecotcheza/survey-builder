<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *        
     * @return void
     */
    protected $users = [
        [
            'name'     => 'mikeschoneveld',
            'email'    => 'mikeschoneveld@msml.nl',

        ], [

            'name'     => 'ghiecotcheza',
            'email'    => 'ghie.cotcheza@gmail.com',

        ]
    ];

    public function run()
    {

        foreach ($this->users as $user) {
            User::firstOrCreate([
                'email'     => $user['email'],
            ], [

                'name'      => $user['name'],
                'password'  => '',
                

            ]);
        }
    }
}
