<?php

namespace Tests\Feature;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * 
     */

    /** @test */
    public function admin_open_page_admin()
    {
        $response = $this->get('/admin');
        $response->assertSuccessful();
        $response->assertViewIs('home');
        $response->assertViewHas(['title', 'active']);
    }

    /** @test */
    public function admin_open_page_login()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('login.index');
        $response->assertViewHas(['title', 'active']);
    }

    /** @test */
    public function login_admin_with_invalid_credential()
    {
        $response = $this->get('/');
        $request = [
            'password' => 'password1',
            'email' => 'userdummy@student.telkomuniversity.ac.id',
            '_token' => session()->token()
        ];
        $response = $this->post('/login', $request);
        $response->assertRedirect();
        $response->assertSessionHas(
            ['loginError' => 'Invalid credentials!']
        );
    }

    /** @test */
    public function login_admin_with_valid_credential()
    {
        $response = $this->get('/');

        $user = User::factory()->create([
            'password' => bcrypt($password = 'password'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
            '_token' => session()->token(),
            'role' => 'admin'
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function admin_can_open_dashboard_after_login()
    {
        $response = $this->get('/');

        $user = User::factory()->create([
            'password' => bcrypt($password = 'password'),
            'role' => 'admin'
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
            'role' => $user->role,
            '_token' => session()->token()
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
        $this->followRedirects($response)
            ->assertViewIs('dashboard.index')
            ->assertViewHas(['title', 'active', 'userCount', 'data', 'average', 'pieData']);
    }

    /** @test */
    public function admin_can_open_respondents_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/respondents');
        $response->assertSuccessful();
        $response->assertViewIs('respondents.index')
            ->assertViewHas(['title', 'active', 'data']);
    }

     /** @test */
     public function admin_can_open_survey_page()
     {
         $user = User::factory()->create();
         $response = $this->actingAs($user)
             ->get('/survey/index');
         $response->assertSuccessful();
         $response->assertViewIs('survey.index')
             ->assertViewHas(['active', 'question', 'section','selectedSectionId']);
     }
}
