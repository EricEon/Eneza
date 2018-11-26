<?php

use App\Subject;
use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject=['English','Mathematics','Science','Social Studies','Swahili','Life Skills'];

        Subject::truncate();

        for ($i=0; $i < 6; $i++) { 
            Subject::create([
                'id'=>$i+1,
                'name'=> $subject[$i],
                'course_id' => mt_rand(1,2)
            ]);
        }
    }
}
