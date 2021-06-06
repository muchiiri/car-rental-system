<?php

use Illuminate\Database\Seeder;

class StatusVehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        $statusTable = DB::table('status_vehicles');
        $statusTable->delete();

        $statusTable->insert([
            'id' => '1',
        	'name' => 'Available'
        ]);
        $statusTable->insert([
            'id' => '2',
        	'name' => 'Maintenance'
        ]);
        $statusTable->insert([
            'id' => '3',
        	'name' => 'leased'
        ]);
        $statusTable->insert([
            'id' => '4',
        	'name' => 'Reserved'
        ]);
        $statusTable->insert([
            'id' => '5',
        	'name' => 'Under Review'
        ]);

    }
}
