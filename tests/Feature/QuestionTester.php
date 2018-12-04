<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionTester extends TestCase
{
    public function test_it_fetches_questions(){
        $response = $this->get('/api/question');

        $response->assertStatus(200)->assertJson([
            'data' => []
        ]);
    }

    public function test_it_fetches_specified_question(){
        $response = $this->get('/api/question/1');

        $response->assertStatus(200);
    }

    public function test_it_cannot_fetch_unknown_id(){
        $response = $this->get('/api/question/100');

        $response->assertJson([
            'error' => [
                'message' => 'Question does not exist!',
                'status_code' => 404
            ]
        ]);
    }

    public function testing_it_has_questions()
    {
        
        $this->assertDatabaseHas('questions', [
            'content' => 'Latitudes move which direction on a map?'
        ]);
    }
}
