<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class userSurveyTest extends TestCase
{

    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function user_can_open_homepage_survey()
    {
        $response = $this->get('/');
        $response->assertSuccessful();
        $response->assertViewIs('scoring.home');
        $response->assertViewHas(['title', 'active']);
    }

    /** @test */
    public function user_click_take_survey()
    {
        $response = $this->get('/survey');
        $response->assertSuccessful();
    }

    /** @test */
    public function user_fill_data()
    {
        $this->withoutExceptionHandling(); //menampilkan error printstrack bila ada error
        $data = [
            'name' => 'test@example.com',
            'email' => 'lulustapastibisa@student.telkomuniversity.ac.id',
            'year' => '123123',
            'nim' => '1234567890',
            '_token' => session()->token()
        ];

        $response = $this->post('/survey/form', $data);
        $response->assertSuccessful();
    }

    /** @test */
    public function user_submit_survey_with_empty_answer()
    {
        $this->withoutMiddleware();
        $response = $this->get('/');
        $response = $this->post('/survey/submit', []);
        $response->assertSessionHasErrors([
            'answers' => 'Please answer all question!'
        ]);
    }


    /** @test */
    public function user_submit_survey_partial_answer()
    {
        $answers = [
            '_token' => session()->token(),
            'answers' => [
                '1' => [
                    '1' => "5",
                    '2' => "5",
                    '3' => "5",
                    '4' => "5",
                    '5' => "5",
                    '6' => "5",
                    '7' => "5",
                    '8' => "5",
                    '9' => "5",
                    '10' => "5",
                    '11' => "5",
                    '12' => "5",
                    '13' => "5",
                    '14' => "5",
                    '15' => "5"
                ],
                '2' => [
                    '16' => "5",
                    '17' => "5",
                    '18' => "5",
                    '19' => "5",
                    '20' => "5",
                    '21' => "5",
                    '22' => "5",
                    '23' => "5",
                    '24' => "5",
                    '25' => "5",
                    '26' => "5",
                    '27' => "5",
                    '28' => "5",
                    '29' => "5",
                    '30' => "5",
                    '31' => "5"
                ],
                '3' => [
                    '32' => "5",
                    '33' => "5",
                    '34' => "5",
                    '35' => "5",
                    '36' => "5",
                    '37' => "5",
                    '38' => "5",
                    '39' => "5",
                    '40' => "5",
                    '41' => "5",
                    '42' => "5",
                    '43' => "5"
                ],
                '4' => [
                    '44' => "5",
                    '45' => "5",
                    '46' => "5",
                    '47' => "5",
                    '48' => "5",
                    '49' => "5",
                    '50' => "5",
                    '51' => "5",
                    '52' => "5",
                    '53' => "5",
                    '54' => "5"
                ]
                // ,
                // '5' => [
                //     '55' => "5",
                //     '56' => "5",
                //     '57' => "5",
                //     '58' => "5",
                //     '59' => "5",
                //     '60' => "5",
                //     '61' => "5",
                //     '62' => "5",
                //     '63' => "5",
                //     '64' => "5"
                // ]
            ]
        ];

        // $this->withoutMiddleware();
        $response = $this->get('/');
        $response = $this->post('/survey/submit', $answers);
        $response->assertSessionHasErrors([
            'answers' => 'Please answer all question!'
        ]);
    }

    /** @test */
    public function user_fill_all_answer()
    {
        $response = $this->get('/');
        $answers = [
            '_token' => session()->token(),
            'answers' => [
                '1' => [
                    '1' => "5",
                    '2' => "5",
                    '3' => "5",
                    '4' => "5",
                    '5' => "5",
                    '6' => "5",
                    '7' => "5",
                    '8' => "5",
                    '9' => "5",
                    '10' => "5",
                    '11' => "5",
                    '12' => "5",
                    '13' => "5",
                    '14' => "5",
                    '15' => "5",
                    '16' => "5"
                ],
                '2' => [
                    '17' => "5",
                    '18' => "5",
                    '19' => "5",
                    '20' => "5",
                    '21' => "5",
                    '22' => "5",
                    '23' => "5",
                    '24' => "5",
                    '25' => "5",
                    '26' => "5",
                    '27' => "5",
                    '28' => "5",
                    '29' => "5",
                    '30' => "5",
                    '31' => "5",
                    '32' => "5",
                    '33' => "5"
                ],
                '3' => [
                    '34' => "5",
                    '35' => "5",
                    '36' => "5",
                    '37' => "5",
                    '38' => "5",
                    '39' => "5",
                    '40' => "5",
                    '41' => "5",
                    '42' => "5",
                    '43' => "5",
                    '44' => "5",
                    '45' => "5",
                    '46' => "5"
                ],
                '4' => [
                    '47' => "5",
                    '48' => "5",
                    '49' => "5",
                    '50' => "5",
                    '51' => "5",
                    '52' => "5",
                    '53' => "5",
                    '54' => "5",
                    '55' => "5",
                    '56' => "5",
                    '57' => "5",
                    '58' => "5"
                ],
                '5' => [
                    '59' => "5",
                    '60' => "5",
                    '61' => "5",
                    '62' => "5",
                    '63' => "5",
                    '64' => "5",
                    '65' => "5",
                    '66' => "5",
                    '67' => "5",
                    '68' => "5",
                    '69' => "5"
                ]
            ]
        ];

        $this->withoutMiddleware();
        $response = $this->post('/survey/submit', $answers);
        $response->assertStatus(200);
        $this->withoutExceptionHandling();
        // $response->assertRedirect('/survey/summary');


    }

    /** @test */
    public function user_can_see_summary_after_submit_survey()
    {
        $this->withSession([
            'final_score' => 1,
            'sections' => [
                ['name' => 'Technological Skills', "score" => 5.0], 
                ['name' => 'Study Habits & Skills', 'score' => 5.0], 
                ['name' => 'Cognitive Presence', 'score' => 5.0],
                ['name' => 'Teaching Presence', "score" => 5.0], 
                ['name' => 'Social Presence', "score" => 5.0]
            ],
        ]);
        $this->withoutExceptionHandling();
        $response = $this->get('/survey/summary');
        $response->assertSuccessful();
    }
}
