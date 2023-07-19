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
    public function index(Request $request)
    {
       
        $user = Auth::user();
        if ($user->role == 'user') {
            if( $request->isMethod('post')){
                User::where('id', $user->id)->update(['survey_clicked'=>1]);
                $user = Auth::user()->fresh();
            }
            if($user->survey_clicked == 0){
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
            $passedUser = [];
            foreach ($dataYears as $year) {
                $scores = User::select('student_id_number')->where('entry_year',$year->entry_year)->where('role','user')->where('final_score', '>=', 3.75)->count();
                array_push($years, $year->entry_year);
                array_push($passedUser,$scores > 0 ? $scores : 0);
            }

            $data = ['years'=>$years,'total'=>$passedUser];

            $ready = User::where('role','user') ->whereRaw('final_score >= 4.2')
            ->count();

            $almostReady = User::where('role','user')->whereRaw('final_score >= 3.4 AND final_score < 4.2 ')
            ->count();

            $needSomeWork = User::where('role','user')->whereRaw('final_score >= 2.6 AND final_score < 3.4 ')
            ->count();

            $notReady = User::where('role','user')->whereRaw('final_score < 2.6')
            ->count();

            $pieData = [$ready,$almostReady,$needSomeWork,$notReady];

            return view('dashboard.index', [
                'title' => 'Dashboard',
                'active' => 'dashboard',
                'userCount' => $userCount,
                'userCountSurvey' => $userCountSurvey,
                'data' =>  $data,
                'pieData' => $pieData
            ]);
        }
    }
}
