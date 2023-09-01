<?php

namespace Tests\Unit;

use App\Http\Controllers\SurveyController;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;

class UserSurveyTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testPenggunaIsiFormDataPertamaKali()
    {
        $credentials = [
            'name' => 'test@example.com',
            'nim' => 'password123',
            'year' => '2016',
            'email' => '@student.telkomuniversity.ac.id'
        ];
        // $this->withoutMiddleware();

        $request = new Request($credentials);
        $surveyController = new SurveyController();
        $response = $surveyController->form($request);

        $response->assertRedirect('/dashboard');
    }
}
