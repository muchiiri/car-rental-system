<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersTable = DB::table('users');
        $usersTable->delete();

        //Users
        $usersTable->insert([
            'profile_id' => '1',
            'name' => 'Admin',
            'email' => 'admin@carsforyou.com',
            'password' => bcrypt('admin@123'),
            'CPF' => '00000000000',
            'CEP' => '00000000',
            'CNH' => '00000000',
            'rental_agency_id' => '1'
        ]);

        $usersTable->insert([
            'profile_id' => '2',
            'name' => 'John',
            'email' => 'johndoe@carsforyou.com',
            'password' => bcrypt('Password'),
            'CPF' => '00000000002',
            'CEP' => '00000000',
            'CNH' => '00000001',
            'rental_agency_id' => '2'
        ]);            

        $usersTable->insert([
            'profile_id' => '3',
            'name' => 'Jane',
            'email' => 'janedoe@carsforyou.com',
            'password' => bcrypt('Password'),
            'CPF' => '00000000001',
            'CEP' => '00000000',
            'CNH' => '00000002',
            'rental_agency_id' => '3'
        ]);

    }
}
