<?php

use Illuminate\Database\Seeder;
use App\Professional;
use App\Customer;

class ProfessionalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Professional::class, 10)->create()->each(function($u){
            $faker = Faker\Factory::create();
            for($i=0;$i<4;$i++){
                $u->customers()->save(factory(Customer::class)->create(),
                    [
                        'start_time' => $faker->dateTime,
                        'duration' => rand(8, 24) * 15,
                        'status' => 'pending',
                        'booking_type' => 'normal',
                        'service' => str_random(20),
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ]
                );
            }
            
        });
    }
}
