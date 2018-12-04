<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TutorialTester extends TestCase
{
    public function test_it_fetches_tutorials(){
        $response = $this->get('/api/tutorial');

        $response->assertStatus(200)->assertJson([
            'data' => []
        ]);
    }

    public function test_it_fetches_specified_tutorial(){
        $response = $this->get('/api/tutorial/1');

        $response->assertStatus(200);
    }

    public function test_it_cannot_fetch_unknown_id(){
        $response = $this->get('/api/tutorial/100');

        $response->assertJson([
            'error' => [
                'message' => 'Tutorial does not exist!',
                'status_code' => 404
            ]
        ]);
    }

    public function testing_it_has_tutorials()
    {
        
        $this->assertDatabaseHas('tutorials', [
            'subject_id' => 2
        ]);
    }
}
