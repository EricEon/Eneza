<?php

use App\Tutorial;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TutorialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tutorial::truncate();

        $faker = Factory::create();
        for ($i=0; $i < 16; $i++) { 
            Tutorial::create([
                'id'=> $i+1,
                'content' => $faker->paragraph,
                'subject_id'=> mt_rand(1,5)
            ]);
        }

    }
}
