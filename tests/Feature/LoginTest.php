<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');
   


        $response = $this->get('/survey');
        $this->withoutExceptionHandling();
        dump(session()->token());
        $data = [
            'name' => 'test@example.com',
            'email' => 'admin@student.telkomuniversity.ac.id',
            'year' => '123123',
            'nim' => '1234567890',
            '_token' => session()->token()
        ];

        $response = $this->post('/survey/form', $data);

        
        $response->assertStatus(200);
    }
}
