<?php

namespace Tests\Unit;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Http\Controllers\YourController; // Make sure to import your actual controller class
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testUserLogin()
    {    
            // Create an instance of the controller
            $controller = new UserController();
    
            // Call the index() method
            $response = $controller->index();
            dump('Halo');
            // Assertions based on your expectations
            $response->assertViewHas('title', 'Respondents');
            $response->assertViewHas('active', 'respondents');
            $this->assertIsArray($response->viewData('data'));
            $response->assertViewIs('respondents.index');
    }
}