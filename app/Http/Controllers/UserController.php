<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $data = User::selectRaw('users.id,users.full_name,users.student_id_number,users.final_score,users.survey_taken_date,
        MAX(CASE WHEN scores.section_id = 1 THEN ((scores.score - 0.2) / (1 - 0.2)) * (5 - 1) + 1 END) AS section1,
        MAX(CASE WHEN scores.section_id = 2 THEN ((scores.score - 0.2) / (1 - 0.2)) * (5 - 1) + 1 END) AS section2,
        MAX(CASE WHEN scores.section_id = 3 THEN ((scores.score - 0.2) / (1 - 0.2)) * (5 - 1) + 1 END) AS section3,
        MAX(CASE WHEN scores.section_id = 4 THEN ((scores.score - 0.2) / (1 - 0.2)) * (5 - 1) + 1 END) AS section4,
        MAX(CASE WHEN scores.section_id = 5 THEN ((scores.score - 0.2) / (1 - 0.2)) * (5 - 1) + 1 END) AS section5')
        ->join('scores','users.student_id_number','=','scores.student_id_number')
        ->where('role','user')
        ->groupBy('users.student_id_number')
        ->latest('users.created_at')
        ->paginate(100)
        ->withQueryString();
        return view('respondents.index', [
            'title' => 'Respondents',
            'active' => 'respondents',
            "data" =>  $data
        ]);
    }
}
