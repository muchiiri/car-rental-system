<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profilesTable = DB::table('profiles');
        $profilesTable->delete();
        $profilesTable->insert([
            'id'=>'1',
        	'name' => 'Administrator',
        	'description' => 'Amount'
        ]);

        $profilesTable->insert([
            'id'=>'2',
        	'name' => 'Employee',
        	'description' => 'Rental employee profile'
        ]);

        $profilesTable->insert([
            'id'=>'3',
        	'name' => 'Client',
        	'description' => 'Carry out vehicle rental'
        ]);

    }
}
