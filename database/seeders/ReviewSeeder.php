<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $review = [
           [
               'review' => 'review1',
               'star' => 10,
               'rate_id' => 1,
               'phone_id' => 1,
           ],
           [
                'review' => 'review2',
                'star' => 20,
                'rate_id' => 2,
                'phone_id' => 2,
            ],
            [
                'review' => 'review3',
                'star' => 30,
                'rate_id' => 3,
                'phone_id' => 3,
            ],
        ];

        foreach($review as $key => $value) {
            Review::insert([
                'review' => $value['review'],
                'star' => $value['star'],
                'rate_id' => $value['rate_id'],
                'phone_id' => $value['phone_id'],
            ]);
        }
    }
}
