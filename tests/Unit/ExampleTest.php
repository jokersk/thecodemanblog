<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ExampleTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function test_updateStatus_url()
    {   
        $response = $this->get('/updateStatus/1/1');
        $response->assertStatus(200);
    }

    public function test_get_blog_data(){
        $response = $this->json("get",'/getBlogData/1');
        $response->assertStatus(200);
        $response->assertJson([
            'status' => 1,
        ]);
    }

    

    
}
