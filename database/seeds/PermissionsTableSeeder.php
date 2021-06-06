<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionsTable = DB::table('permissions');
        $permissionsTable->delete();
        //Users
        $permissionsTable->insert([
            'id' => '1',
        	'name' => 'Users_Create',
        	'description' => 'Can Create user'
        ]);

        $permissionsTable->insert([
            'id' => '2',
        	'name' => 'Users_Update',
        	'description' => 'Can Edit User'
        ]);

        $permissionsTable->insert([
            'id' => '3',
        	'name' => 'Users_Delete',
        	'description' => 'Can Delete User'
        ]);

        $permissionsTable->insert([
            'id' => '4',
        	'name' => 'Users_List_all',
        	'description' => 'View all Users'
        ]);
        
        $permissionsTable->insert([
            'id' => '5',
        	'name' => 'Users_list_part',
        	'description' => 'Allowed to list part of users'
        ]);
        //vehicle
        $permissionsTable->insert([
            'id' => '6',
            'name' => 'Vehicle_Create',
            'description' => 'Can create vehicle'
        ]);

        $permissionsTable->insert([
            'id' => '7',
            'name' => 'Vehicle_Update',
            'description' => 'Can Edit Vehicle'
        ]);

        $permissionsTable->insert([
            'id' => '8',
            'name' => 'Vehicle_Delete',
            'description' => 'Can Delete Vehicle'
        ]);

        $permissionsTable->insert([
            'id' => '9',
            'name' => 'Vehicle_List_all',
            'description' => 'See Vehicles'
        ]);
        
        $permissionsTable->insert([
            'id' => '10',
            'name' => 'Vehicle_list_part',
            'description' => 'List Cars'
        ]);
        //rent
        $permissionsTable->insert([
            'id' => '11',
            'name' => 'Rent_Create',
            'description' => 'Can Create rental'
        ]);

        $permissionsTable->insert([
            'id' => '12',
            'name' => 'Rent_Update',
            'description' => 'Can Update Rentals'
        ]);

        $permissionsTable->insert([
            'id' => '13',
            'name' => 'Rent_Delete',
            'description' => 'Can delete Rentals'
        ]);

        $permissionsTable->insert([
            'id' => '14',
            'name' => 'Rent_List_all',
            'description' => 'Can View All Vehicles'
        ]);
        
        $permissionsTable->insert([
            'id' => '15',
            'name' => 'Rent_list_part',
            'description' => 'Can List Rentals'
        ]);
        $permissionsTable->insert([
            'id' => '16',
            'name' => 'List_all_Vehicles_rent',
            'description' => 'Allowed to list all available vehicles'
        ]);
        $permissionsTable->insert([
            'id' => '18',
            'name' => 'Rent_Update_part',
            'description' => 'Allowed to update by customer'
        ]);
        //Geral
        $permissionsTable->insert([
            'id' => '17',
            'name' => 'Full_access',
            'description' => 'all allowed'
        ]);
        

    }
}
