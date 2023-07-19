<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('respondents.index', [
            'title' => 'Respondents',
            'active' => 'respondents',
            "data" => User::select('id','full_name','student_id_number','final_score','survey_taken_date')->where('role','user')->latest()->paginate(100)->withQueryString()
        ]);
    }
}
