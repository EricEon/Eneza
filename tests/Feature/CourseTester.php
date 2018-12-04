<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseTester extends TestCase
{

    public function test_it_fetches_courses(){
        $response = $this->get('/api/course');

        $response->assertStatus(200)->assertJson([
            'data' => []
        ]);
    }

    public function test_it_fetches_specified_course(){
        $response = $this->get('/api/course/1');

        $response->assertStatus(200);
    }

    public function test_it_cannot_fetch_unknown_id(){
        $response = $this->get('/api/course/100');

        $response->assertJson([
            'error' => [
                'message' => 'Course does not exist!',
                'status_code' => 404
            ]
        ]);
    }

    public function testing_it_has_courses()
    {
        
        $this->assertDatabaseHas('courses', [
            'name' => 'Primary'
        ]);
    }

    
}
