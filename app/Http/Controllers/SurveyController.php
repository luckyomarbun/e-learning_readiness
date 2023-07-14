<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Section;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index(Request $request)
    {

        $sectionId = $request->sectionId == null ? 1 : $request->sectionId ;

        return view('survey.index', [
            'active' => 'survey',
            "question" => Question::where('section_id',$sectionId)->latest()->paginate(100)->withQueryString(),
            "section" => Section::orderBy('id', 'ASC')->get(),
            "selectedSectionId" => $sectionId
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'value' => 'required',
            'section_id' => 'required'
        ]);
     
        Question::create($validatedData);
       
        return redirect()
            ->route('survey.index',['sectionId' => $request->section_id])
            ->with('success','Question add successfully');
    }

    public function create(Request $request)
    {       
        return view('survey.create',[ "selectedSectionId" => $request->selectedSectionId ]);
    }

    public function edit($id)
    {
        $question = Question::where('id', $id)->first();
        return view('survey.edit', [ "question" => $question ]);
    }

    public function update(Request $request, $id)
    {
        $question = Question::where('id', $id)->first();
        $question->update([
            'value'   => $request->value
        ]);

        return redirect()
            ->route('survey.index')
            ->with('success','Alternative updated successfully');
    }
}
