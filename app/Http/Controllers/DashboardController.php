<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Score;
use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 'user') {
            if ($user->survey_completed == 0) {
                $sections = Section::get();
                foreach ($sections as $section) {
                    $section->questions = Question::where('section_id', $section->id)->get();
                }
                return view('dashboardU.index', [
                    'active' => 'dashboard',
                    'sections' => $sections
                ]);
            } else if ($user->survey_completed == 1) {
                return view('dashboardU.index-after-survey', [
                    'active' => 'dashboard'
                ]);
            }
        } else if ($user->role == 'admin') {
            $userCount = User::where('role', 'user')->count();
            $userCountSurvey = User::where('role', 'user')->where('survey_completed', '1')->count();
            $dataYears = User::where('role', 'user')->distinct()->get('entry_year')->sortBy('entry_year');
            $years = [];
            $passedUser = [];
            
            foreach ($dataYears as $year) {
                array_push($years, $year->entry_year);
                $scores = Score::select('scores.student_id_number')
                ->join('users', 'scores.student_id_number', '=', 'users.student_id_number')
                ->where('users.entry_year',$year->entry_year)
                ->groupBy('scores.student_id_number')
                ->havingRaw('(sum(scores.score)/5) > 3.75')
                ->count();
                if( $scores > 0 ){
                    array_push($passedUser,$scores);
                } else {
                    array_push($passedUser,0);
                }
            }
            $data = ['years'=>$years,'total'=>$passedUser];
            
            $ready = Score::select('scores.student_id_number')
            ->join('users', 'scores.student_id_number', '=', 'users.student_id_number')
            ->groupBy('scores.student_id_number')
            ->havingRaw('(sum(scores.score)/5) >= 4.2')
            ->count();

            $almostReady = Score::select('scores.student_id_number')
            ->join('users', 'scores.student_id_number', '=', 'users.student_id_number')
            ->groupBy('scores.student_id_number')
            ->havingRaw('(sum(scores.score)/5) >= 3.4 AND (sum(scores.score)/5) < 4.2 ')
            ->count();

            $needSomeWork = Score::select('scores.student_id_number')
            ->join('users', 'scores.student_id_number', '=', 'users.student_id_number')
            ->groupBy('scores.student_id_number')
            ->havingRaw('(sum(scores.score)/5) >= 2.6 AND (sum(scores.score)/5) < 3.4 ')
            ->count();

            $notReady = Score::select('scores.student_id_number')
            ->join('users', 'scores.student_id_number', '=', 'users.student_id_number')
            ->groupBy('scores.student_id_number')
            ->havingRaw('(sum(scores.score)/5) < 2.6')
            ->count();

            $pieData = [$ready,$almostReady,$needSomeWork,$notReady];

            return view('dashboard.index', [
                'active' => 'dashboard',
                'userCount' => $userCount,
                'userCountSurvey' => $userCountSurvey,
                'data' =>  $data,
                'pieData' => $pieData
            ]);
        }
    }
}
