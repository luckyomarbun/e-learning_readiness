<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Http\Controllers\LoginController;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    // public function testIndex()
    // {
    //     $controller = new LoginController();
    //     $response = $controller->index();

    //     $response->assert('title', 'Login');
    //     $response->assertViewHas('active', 'login');
    //     $response->assertViewIs('login.index');
    // }

    public function testLoginAdminBerhasil()
    {
        $credentials = [
            'email' => 'test@example.com',
            'password' => 'password123',
        ];

        Auth::shouldReceive('attempt')
            ->once()
            ->with($credentials)
            ->andReturn(true);

        $request = new Request($credentials);
        $controller = new LoginController();
        $response = $controller->authenticate($request);

        $response->assertRedirect('/dashboard');
    }

    public function testAuthenticateWithInvalidCredentials()
    {
        $credentials = [
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
        ];

        Auth::shouldReceive('attempt')
            ->once()
            ->with($credentials)
            ->andReturn(false);

        $request = new Request($credentials);
        $controller = new LoginController();
        $response = $controller->authenticate($request);

        $response->assertRedirect();
        $response->assertSessionHas('loginError', 'Invalid credentials!');
    }

    public function testLogout()
    {
        Auth::shouldReceive('logout')->once();
        $request = new Request();
        $controller = new LoginController();
        $response = $controller->logout($request);

        $response->assertRedirect('/');
    }
}
