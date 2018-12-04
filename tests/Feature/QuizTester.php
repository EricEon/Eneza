<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuizTester extends TestCase
{
    public function test_it_fetches_quizzes(){
        $response = $this->get('/api/quiz');

        $response->assertStatus(200)->assertJson([
            'data' => []
        ]);
    }

    public function test_it_fetches_specified_quiz(){
        $response = $this->get('/api/quiz/1');

        $response->assertStatus(200);
    }

    public function test_it_cannot_fetch_unknown_id(){
        $response = $this->get('/api/quiz/100');

        $response->assertJson([
            'error' => [
                'message' => 'Quiz does not exist!',
                'status_code' => 404
            ]
        ]);
    }

    public function testing_it_has_quizzes()
    {
        
        $this->assertDatabaseHas('quizzes', [
            'subject_id' => 1
        ]);
    }
}
