<?php

class ServicesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('services')->delete();

        Service::create([
            'user_id' => 1,
            'service_type_id' => 1,
            'rating' => 0,
            'rate_count' => 0,
            'name' => 'Mutthuraj Electricals',
            'address' => 'KSLayout',
            'mobile' => '+919012345678',
            'landline' => '08012345678',
            'zipcode' => '560999',
            'city' => 'Bangalore',
            'gps_latitude' => 12.908483,
            'gps_longitude' => 77.566245
        ]);

        Service::create([
            'user_id' => 1,
            'service_type_id' => 2,
            'rating' => 2,
            'rate_count' => 2,
            'name' => 'Mario Plumbers',
            'address' => 'KSLayout',
            'mobile' => '+919012345678',
            'landline' => '08012345678',
            'zipcode' => '560999',
            'city' => 'Bangalore',
            'gps_latitude' => 12.906025,
            'gps_longitude' => 77.573240
        ]);

        Service::create([
            'user_id' => 2,
            'service_type_id' => 3,
            'rating' => 5,
            'rate_count' => 3,
            'name' => 'Pizza Italia',
            'address' => 'KSLayout',
            'mobile' => '+919012345678',
            'landline' => '08012345678',
            'zipcode' => '560999',
            'city' => 'Bangalore',
            'gps_latitude' => 12.92000,
            'gps_longitude' => 77.55000
        ]);

        Service::create([
            'user_id' => 2,
            'service_type_id' => 4,
            'rating' => 4,
            'rate_count' => 4,
            'name' => 'Hard-Wood Carpenters',
            'address' => 'KSLayout',
            'mobile' => '+919012345678',
            'landline' => '08012345678',
            'zipcode' => '560999',
            'city' => 'Bangalore',
            'gps_latitude' => 12.898483,
            'gps_longitude' => 77.560245
        ]);

    }
}
