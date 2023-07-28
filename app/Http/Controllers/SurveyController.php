<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Score;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class SurveyController extends Controller
{

    public function survey(Request $request)
    {
        // if ($request->isMethod('POST')) {
        //     dd('Haiii');
        //     $user = User::where('student_id_number',$request->nim)->where('email',Str::upper($request->email))->get();
        //     if($user->isEmpty()){
        //         $sections = Section::get();
        //         foreach ($sections as $section) {
        //             $section->questions = Question::where('section_id', $section->id)->get();
        //         }
        //         return view('scoring.index-before-survey', [
        //             'title' => 'Survey',
        //             'active' => 'Survey',
        //             'sections' => $sections
        //         ]);
        //     } else  {
        //         if($user->survey_completed == 1){
        //             return view('scoring.index', [
        //                 'title' => 'Scoring',
        //                 'active' => 'Scoring'
        //             ]);
        //         }
        //     }
        // }
        session()->forget('final_score');
        session()->forget('sections');

        return view('scoring.index', [
            'title' => 'Scoring',
            'active' => 'Scoring'
        ]);
    }

    public function summary()
    {
        if (session()->get('final_score') == null || session()->get('sections') == null) {

            return redirect('/survey/');
            // return redirect('/survey/summary');
        }


        return view('scoring.index-after-survey', [
            'title' => 'Survey',
            'active' => 'Survey',
        ]);
    }
    public function form(Request $request)
    {

        if (Session::get('userData') != null && $request->form_user == null) {
            $user = User::where('email', Session::get('userData')['email'])->where('student_id_number', Session::get('userData')['student_id_number'])->first();
            if ($user != null && $user->survey_completed == 1) {
                dd("SUDAH BERHASIL ISI SURVEY");
            } else {
                return redirect('/survey/');
            }
        } else {
            $user = User::where('student_id_number', $request->input('nim'))->orWhere('email', $request->input('email'))->first();
            if ($user != null) {
                $section = Section::get();
                $sections = [];
                foreach ($section as $s) {
                    $score = Score::select('score')->where('student_id_number', $user->student_id_number)->where('section_id', $s->id)->first();
                    array_push($sections, ['name' => $s->value, 'score' => $score->score ?? 0]);
                }
                // return view('scoring.index-after-survey', [
                //     'title' => 'Summary',
                //     'active' => 'Summary',
                //     'final_score' => $user->final_score,
                //     'sections' =>  $sections
                // ]);
                Session::put('final_score', $user->final_score);
                Session::put('sections', $sections);
                return redirect('/survey/summary');
            } else {
                Session::put('userData', [
                    'name' => $request->input('name'),
                    'username' => $request->input('name'),
                    'password' => bcrypt('password'),
                    'student_id_number' => $request->input('nim'),
                    'email' => $request->input('email'),
                    'entry_year' => $request->input('year'),
                    'full_name' => $request->input('name'),
                    'student_major' => 'IT'
                ]);

                $sections = Section::get();
                foreach ($sections as $section) {
                    $section->questions = Question::where('section_id', $section->id)->get();
                }

                return view('scoring.index-before-survey', [
                    'title' => 'Survey',
                    'active' => 'Survey',
                    'sections' => $sections
                ]);
            }
        }
    }

    public function index(Request $request)
    {

        $sectionId = $request->sectionId == null ? 1 : $request->sectionId;

        return view('survey.index', [
            'active' => 'survey',
            "question" => Question::where('section_id', $sectionId)->latest()->paginate(100)->withQueryString(),
            "section" => Section::orderBy('id', 'ASC')->get(),
            "selectedSectionId" => $sectionId
        ]);
    }

    public function start()
    {
        User::where('id', Auth::user()->id)->update(['survey_clicked' => 1]);
        $sections = Section::get();
        foreach ($sections as $section) {
            $section->questions = Question::where('section_id', $section->id)->get();
        }
        return view('dashboardU.index', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'sections' => $sections
        ]);
    }

    public function submit(Request $request)
    {
        // $validator = FacadesValidator::make($request->all(), []);

        // $validator->after(function ($validator) use ($request) {
        //     $answers = $request->input('answers');
        //     $totalAnsweredQuestions = 0;

        //     if ($answers == null) {
        //         $validator->errors()->add('answers', 'Please answer all question!');
        //     } else {
        //         foreach ($answers as $sectionId => $sectionAnswers) {
        //             $totalAnsweredQuestions += count($sectionAnswers);
        //         }
        //         $totalQuestion = Question::count();
        //         if ($totalAnsweredQuestions !== $totalQuestion) {
        //             $validator->errors()->add('answers', 'Please answer all question!');
        //         }
        //     }
        // });

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        //add scores
        $answers = $request->input('answers');
        // $userAuth = Session::get('userData');
        if (Session::get('userData') != null) {
            $userAuth = User::create(Session::get('userData'));
            $final_score = 0;
            foreach ($answers as $key => $answer) {
                $score = new Score();
                $totalQuestion = count($answer);
                $totalScoreAllQuestion = 0;
                foreach ($answer as $value) {
                    $totalScoreAllQuestion += $value;
                }
                $totalScoreSection =  $totalScoreAllQuestion / ($totalQuestion * 5);
                $score->student_id_number = $userAuth->student_id_number;
                $score->section_id = $key;
                $score->score = $totalScoreSection;
                $score->save();
                $final_score += $totalScoreSection;
            }
            $totalSection = Section::count();
            // $userAuth['survey_completed'] = 1;
            // $userAuth['survey_taken_date'] = now();
            // $userAuth['final_score'] = ($final_score / $totalSection);
            // $userAuth['survey_clicked'] = 1;
            // Session::put('userData', $userAuth);
            $userAuth->update(['survey_completed' => 1, 'survey_taken_date' => now(), 'final_score' => ($final_score), 'survey_clicked' => 1]);
            // Session::forget('userData');
            // return redirect()
            //     ->route('index-after-survey')
            //     ->with('success', 'Answers Has Been Submited Successfully');
            $section = Section::get();
            $sections = [];
            foreach ($section as $s) {
                $score = Score::select('score')->where('student_id_number',  $userAuth->student_id_number)->where('section_id', $s->id)->first();
                array_push($sections, ['name' => $s->value, 'score' => $score->score ?? 0]);
            }
            Session::put('final_score', $userAuth->final_score);
            Session::put('sections', $sections);
            return redirect('/survey/summary');
        } else {
            return view('scoring.index', [
                'title' => 'Scoring',
                'active' => 'Scoring'
            ]);
        }
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'value' => 'required',
    //         'section_id' => 'required'
    //     ]);

    //     Question::create($validatedData);

    //     return redirect()
    //         ->route('survey.index', ['sectionId' => $request->section_id])
    //         ->with('success', 'Question add successfully');
    // }

    public function store(Request $request)
    {
        // Check if the current route is 'survey/form'
        if ($request->has('survey_form_submitted')) {

            $validator = FacadesValidator::make($request->all(), []);

            $validator->after(function ($validator) use ($request) {
                $answers = $request->input('answers');
                $totalAnsweredQuestions = 0;

                if ($answers == null) {
                    $validator->errors()->add('answers', 'Please answer all question!');
                } else {
                    foreach ($answers as $sectionId => $sectionAnswers) {
                        $totalAnsweredQuestions += count($sectionAnswers);
                    }
                    $totalQuestion = Question::count();
                    if ($totalAnsweredQuestions !== $totalQuestion) {
                        $validator->errors()->add('answers', 'Please answer all question!');
                    }
                }
            });

            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator)->withInput();
            }

            // If processing is successful, redirect to another page
            return redirect()->route('thankyou')->with('success', 'Survey submitted successfully!');
        }

        // If the current route is 'survey', handle the initial survey form submission
        // Check if user data exists based on the NIM
        $user = User::where('student_id_number', $request->input('nim'))->first();

        if ($user) {
            // User data exists, show the summary view
            return view('survey.index-after-survey', ['user' => $user]);
        } else {
            // User data doesn't exist, save the user data
            $user = $this->saveUserData($request->all());

            // Redirect to the next step (survey form)
            return redirect()->route('survey.form', ['user' => $user->id]);
        }
    }

    public function create(Request $request)
    {
        return view('survey.create', ["selectedSectionId" => $request->selectedSectionId]);
    }

    public function edit($id)
    {
        $question = Question::where('id', $id)->first();
        return view('survey.edit', ["question" => $question]);
    }

    public function update(Request $request, $id)
    {
        $question = Question::where('id', $id)->first();
        $question->update([
            'value'   => $request->value
        ]);

        return redirect()
            ->route('survey.index')
            ->with('success', 'Alternative updated successfully');
    }
}
