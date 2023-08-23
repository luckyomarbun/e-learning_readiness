<?php

namespace Tests\Unit;

use Illuminate\Http\Request;
use App\Http\Controllers\YourController; // Make sure to import your actual controller class
use Tests\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use App\Models\User;

class UserControllerTest extends TestCase
{
    public function testIndex()
    {
            // Mock a request
            $request = $this->getMockBuilder(Request::class)->getMock();
    
            // Mock the User::select() query
            User::shouldReceive('select')->with('id','full_name','student_id_number','final_score','survey_taken_date')
                ->andReturnSelf()
                ->shouldReceive('where')->with('role', 'user')->andReturnSelf()
                ->shouldReceive('latest')->andReturnSelf()
                ->shouldReceive('paginate')->with(100)->andReturn([
                    // Mock user data here...
                ]);
    
            // Create an instance of the controller
            $controller = new YourController();
    
            // Call the index() method
            $response = $controller->index($request);
    
            // Assertions based on your expectations
            $response->assertViewHas('title', 'Respondents');
            $response->assertViewHas('active', 'respondents');
            $this->assertIsArray($response->viewData('data'));
            $response->assertViewIs('respondents.index');
    }
}