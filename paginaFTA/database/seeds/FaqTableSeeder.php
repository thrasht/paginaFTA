<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Faq as Faq;
use Faker\Factory as Faker;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class FaqTableSeeder extends Seeder {

    public function run()
    {
		$faker = Faker::create();

		foreach(range(1,20) as $index)
		{
			DB::table('faqs')->insert(array(

				'question' 		=> $faker->text(rand(10,30)),
				'answer' 		=> $faker->text(rand(50,100))
				
			));
		}
        // TestDummy::times(20)->create('App\Post');
    }

}