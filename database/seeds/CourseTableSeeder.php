<?php

use App\Course;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::truncate();
        $name = [
            'Primary',
            'Secondary'
        ];

        for ($i=0; $i < 2; $i++) { 
            DB::table('courses')->insert([
                'id' => $i+1,
                'name'=>$name[$i],
                'user_id' => mt_rand(1,2)
            ]);
        }                    
        
    }
}
