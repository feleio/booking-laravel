<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Customer::class, 10)->create()->each(function($u){
            $faker = Faker\Factory::create();
            for($i=0;$i<2;$i++){
                $u->professionals()->save(factory(App\Professional::class)->create(),
                    [
                        'start_time' => $faker->dateTime,
                        'duration' => rand(8, 24) * 15,
                        'status' => 'pending',
                        'booking_type' => 'normal',
                        'service' => str_random(20)
                    ]
                );
            }
        });
    }
}
