<?php

use Illuminate\Database\Seeder;

class RentalAgencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rentalAgencyTable = DB::table('rental_agencies');
        $rentalAgencyTable->delete();

         //rentalAgency
         $rentalAgencyTable->insert([
            'id' => '1',
            'name' => 'Big Time',
            'city' => 'Kuwaiti City',
            'state' => 'MS',
            'country' => 'Kuwait',
            'location' => 'Wellness st, 232',
            'CNPJ' => '45348894000143'
        ]);

        $rentalAgencyTable->insert([
            'id' => '2',
            'name' => 'Olive',
            'city' => 'Kuwaiti City',
            'state' => 'MS',
            'country' => 'Kuwait',
            'location' => 'Al Yusra, 454',
            'CNPJ' => '23348894000143'
        ]);
        
        $rentalAgencyTable->insert([
            'id' => '3',
            'name' => 'Best 4 U',
            'city' => 'Kuwaiti City',
            'state' => 'MS',
            'country' => 'Kuwait',
            'location' => ' Lima, 232',
            'CNPJ' => '88348894000143'
        ]);

       
    }
}
