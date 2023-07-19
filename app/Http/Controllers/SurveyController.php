<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Score;
use App\Models\Section;
use App\Models\User;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class SurveyController extends Controller
{
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

    public function submit(Request $request)
    {

        $validator = FacadesValidator::make($request->all(), []);
        
        $validator->after(function ($validator) use ($request) {
            $answers = $request->input('answers');
            $totalAnsweredQuestions = 0;
            
            if ($answers==null) {
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

        //add scores
        $answers = $request->input('answers');
        $userAuth = Auth::user();
        $final_score = 0;
        foreach($answers as $key => $answer){
            $score = new Score();
            $totalQuestion = count($answer);
            $totalScoreAllQuestion = 0;
            foreach($answer as $value){
                $totalScoreAllQuestion+=$value;
            }
            $totalScoreSection =  $totalScoreAllQuestion/($totalQuestion*5);
            $score->student_id_number = $userAuth->student_id_number;
            $score->section_id = $key;
            $score->score = $totalScoreSection;
            $score->save();
            $final_score+=$totalScoreSection;
        }
        $totalSection = Section::count();
        User::where('id', $userAuth->id)->update(['survey_completed' => 1,'survey_taken_date' => now(),'final_score'=>($final_score/$totalSection)]);
        return redirect()
            ->route('dashboard')
            ->with('success', 'Answers Has Been Submited Successfully');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'value' => 'required',
            'section_id' => 'required'
        ]);

        Question::create($validatedData);

        return redirect()
            ->route('survey.index', ['sectionId' => $request->section_id])
            ->with('success', 'Question add successfully');
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
