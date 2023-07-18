<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        if($role == 'user') {
            $sections = Section::get();
            foreach($sections as $section){
                $section->questions = Question::where('section_id', $section->id)->get();
            }
            return view('dashboardU.index', [
                'active' => 'dashboard',
                'sections' => $sections
            ]);
        } else if ($role == 'admin'){

            $userCount = User::where('role','user')->count();
            $userCountSurvey = User::where('role','user')->where('survey_completed','1')->count();
            return view('dashboard.index', [
                'active' => 'dashboard',
                'userCount' => $userCount,
                'userCountSurvey' => $userCountSurvey
            ]);
        }
        
    }
}
