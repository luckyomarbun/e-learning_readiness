<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Score;
use App\Models\Section;
use App\Models\User;
use Database\Seeders\ScoreSeeder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();
        if ($user->role == 'user') {
            if ($request->isMethod('post')) {
                User::where('id', $user->id)->update(['survey_clicked' => 1]);
                $user = Auth::user()->fresh();
            }
            if ($user->survey_clicked == 0) {
                return view('dashboardU.index-before-survey', [
                    'title' => 'Dashboard',
                    'active' => 'dashboard'
                ]);
            }

            if ($user->survey_completed == 0) {
                $sections = Section::get();
                foreach ($sections as $section) {
                    $section->questions = Question::where('section_id', $section->id)->get();
                }
                return view('dashboardU.index', [
                    'title' => 'Dashboard',
                    'active' => 'dashboard',
                    'sections' => $sections
                ]);
            } else if ($user->survey_completed == 1) {
                return view('dashboardU.index-after-survey', [
                    'title' => 'Dashboard',
                    'active' => 'dashboard'
                ]);
            }
        } else if ($user->role == 'admin') {
            $userCount = User::where('role', 'user')->count();
            $userCountSurvey = User::where('role', 'user')->where('survey_completed', '1')->count();
            $dataYears = User::where('role', 'user')->distinct()->get('entry_year')->sortBy('entry_year');
            $years = [];
            $section1 = [];
            $section2 = [];
            $section3 = [];
            $section4 = [];
            $section5 = [];
            foreach ($dataYears as $year) {
                // $scores = User::select('student_id_number')->where('entry_year',$year->entry_year)->where('role','user')->where('final_score', '>=', 3.75)->count();
                array_push($years, $year->entry_year);
                // array_push($passedUser,$scores > 0 ? $scores : 0);
            }

            $section_year = User::selectRaw('entry_year,
            FORMAT(SUM(CASE WHEN scores.section_id = 1 THEN ((scores.score - 0.2) / (1 - 0.2)) * (5 - 1) + 1 END)/SUM(CASE WHEN scores.section_id  = 1 THEN 1 END),2) AS section1,
            FORMAT(SUM(CASE WHEN scores.section_id = 2 THEN ((scores.score - 0.2) / (1 - 0.2)) * (5 - 1) + 1 END)/SUM(CASE WHEN scores.section_id  = 1 THEN 1 END),2) AS section2,
            FORMAT(SUM(CASE WHEN scores.section_id = 3 THEN ((scores.score - 0.2) / (1 - 0.2)) * (5 - 1) + 1 END)/SUM(CASE WHEN scores.section_id  = 1 THEN 1 END),2) AS section3,
            FORMAT(SUM(CASE WHEN scores.section_id = 4 THEN ((scores.score - 0.2) / (1 - 0.2)) * (5 - 1) + 1 END)/SUM(CASE WHEN scores.section_id  = 1 THEN 1 END),2) AS section4,
            FORMAT(SUM(CASE WHEN scores.section_id = 5 THEN ((scores.score - 0.2) / (1 - 0.2)) * (5 - 1) + 1 end)/SUM(CASE WHEN scores.section_id  = 1 THEN 1 END),2) AS section5')
                ->join('scores', 'users.student_id_number', '=', 'scores.student_id_number')
                ->groupBy('users.entry_year')
                ->oldest('users.entry_year')->get();
            foreach ($section_year as $section_score) {
                array_push($section1,$section_score->section1);
                array_push($section2,$section_score->section2);
                array_push($section3,$section_score->section3);
                array_push($section4,$section_score->section4);
                array_push($section5,$section_score->section5);
            }

            
            $data = ['years' => $years, 'section1' => $section1,'section2' => $section2,'section3' => $section3,'section4' => $section4,'section5' => $section5];
            // $ready = User::where('role','user') ->whereRaw('final_score >= 4.2')
            // ->count();

            // $almostReady = User::where('role','user')->whereRaw('final_score >= 3.4 AND final_score < 4.2 ')
            // ->count();

            // $needSomeWork = User::where('role','user')->whereRaw('final_score >= 2.6 AND final_score < 3.4 ')
            // ->count();

            // $notReady = User::where('role','user')->whereRaw('final_score < 2.6')
            // ->count();

            $pieData = [];

            $average = Score::selectRaw('section_id,FORMAT(sum(((score - 0.2) / (1 - 0.2)) * (5 - 1) + 1)/count(score),2) as section_score')
                ->groupBy('section_id')->orderBy('section_id')->get();
            // dd($average);

            return view('dashboard.index', [
                'title' => 'Dashboard',
                'active' => 'dashboard',
                'userCount' => $userCount,
                'userCountSurvey' => $userCountSurvey,
                'data' =>  $data,
                'average' =>  $average,
                'pieData' => $pieData
            ]);
        }
    }
}
