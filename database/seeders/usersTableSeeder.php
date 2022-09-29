<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // User::create([
        //     'address' => 'جولة الكميم',
        //         'size' => '32 متر مربع',
        //         'apartment_type' => 'normal',
        //         'rooms_number'=> 5,
        //         'bathroms_number' => 2,
        //         'apartment_description'=> 'تجاريه',
        //         'start_at'=>  now(),
        //         // 'end_at'=>   now(),
        //         'rent_cyclic'=> 'monthly',
        //         'price_of_rent'=> 20000.0,
        //         'number_presenter_payment'=> 6,
        //         'user_id'=> 1,
        //     ]);
    }
}
