<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        return view('survey.index', [
            'active' => 'survey',
            "question" => Question::latest()->paginate(100)->withQueryString()
        ]);
    }
}
