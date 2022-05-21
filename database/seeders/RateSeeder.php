<?php

namespace Database\Seeders;

use App\Models\Phone;
use App\Models\Rating;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rate = [
			[

                'rate'          =>  10,
				'phone_id'		=> 1,
			],
			[
			    'rate'          =>  20,
				'phone_id'	    => 2,
			],
			[
			    'rate'          =>  30,
                'phone_id'      => 3,
            ],
            
        ];

        foreach($rate as $key => $value) {
            Rating::insert([
                'rate' => $value['rate'],
                'phone_id' => $value['phone_id']
            ]);
        }
    }
}
