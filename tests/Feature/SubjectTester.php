<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubjectTester extends TestCase
{
    public function test_it_fetches_subjects(){
        $response = $this->get('/api/subject');

        $response->assertStatus(200)->assertJson([
            'data' => []
        ]);
    }

    public function test_it_fetches_specified_subject(){
        $response = $this->get('/api/subject/1');

        $response->assertStatus(200);
    }

    public function test_it_cannot_fetch_unknown_id(){
        $response = $this->get('/api/subject/100');

        $response->assertJson([
            'error' => [
                'message' => 'Subject does not exist!',
                'status_code' => 404
            ]
        ]);
    }

    public function testing_it_has_subjects()
    {
        
        $this->assertDatabaseHas('subjects', [
            'name' => 'English'
        ]);
    }
}
