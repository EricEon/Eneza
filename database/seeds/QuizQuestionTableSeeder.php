<?php

use App\Quiz;
use App\Question;
use Faker\Factory;
use Illuminate\Database\Seeder;

class QuizQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Quiz::truncate();
        Question::truncate();

        $question = [
            'Latitudes move which direction on a map?',
            'What is the largest planet in our galaxy?',
            'The higher you go, the cooler it becomes?'
        ];
        $answer = [
            'East to West',
            'Jupiter',
            'True'
        ];
        for ($i=0; $i < 12; $i++) { 
           $quiz =  Quiz::create([
                'id'=> $i+1,
                'name' => $faker->word,
                'subject_id' => mt_rand(1,5)
            ]);

            
        }

        for ($i=0; $i < 15; $i++) { 
            Question::create([
                'id'=>$i+1,
                'content' => $question[mt_rand(0,2)],
                'answer' => $answer[mt_rand(0,2)],
                'quiz_id'=> $quiz->id
            ]);
        }
    }
}
