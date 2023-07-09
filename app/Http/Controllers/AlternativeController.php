<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\AlternativeComparison;
use App\Models\PriorityVectorAlternative;
use App\Models\Rank;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    public function index()
    {
        return view('alternative.index', [
            'title' => 'Alternative',
            'active' => 'alternative',
            "alternatives" => Alternative::latest()->paginate(100)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('alternative.create', [
            'title' => 'Alternative',
            'active' => 'alternative'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        Alternative::create($validatedData);

        $alternativeComparisons = AlternativeComparison::with([
            'firstAlternatives',
            'secondAlternatives',
            'criterias',
            'valueWeights'
        ])->get();

        if (count($alternativeComparisons) > 0) {
            $alternatives = Alternative::all();
            $firstAlternatives = AlternativeComparison::distinct()->get(["first_alternative_id"]);
            $secondAlternatives = AlternativeComparison::distinct()->get(["second_alternative_id"]);

            $firstAlternativesN = array();
            foreach ($firstAlternatives as $firstAlternative) {
                array_push($firstAlternativesN, $firstAlternative->first_alternative_id);
            }

            $secondAlternativesN = array();
            foreach ($secondAlternatives as $secondAlternative) {
                array_push($secondAlternativesN, $secondAlternative->second_alternative_id);
            }

            $alternativesN = array();
            foreach ($alternatives as $alternative) {
                array_push($alternativesN, $alternative->id);
            }

            $alternativesCompared = array_unique(array_merge($firstAlternativesN,$secondAlternativesN));
            $diffs = array_diff($alternativesN, $alternativesCompared);
            if (count($diffs) > 0) {
                AlternativeComparison::truncate();
                Rank::truncate();
            }
        }

        return redirect('/alternative')->with('success', 'Created alternative success!');
    }

    public function edit($id)
    {
        $alternative = Alternative::where('id', $id)->first();
        return view('alternative.edit', [ "alternative" => $alternative ]);
    }

    public function update(Request $request, $id)
    {
        $alternative = Alternative::where('id', $id)->first();
        $alternative->update([
            'name'   => $request->name
        ]);

        return redirect()
            ->route('alternative.index')
            ->with('success','Alternative updated successfully');
    }

    public function delete($code)
    {
        $alternative = Alternative::where('id', $code)->first();
        return view('alternative.delete', [ "alternative" => $alternative ]);
    }

    public function destroy($code)
    {
        Rank::where('alternative_id', $code)->delete();
        AlternativeComparison::where('first_alternative_id', $code)->orWhere('second_alternative_id', $code)->delete();
        PriorityVectorAlternative::where('alternative_id', $code)->delete();
        $alternative = Alternative::where('id', $code)->firstorfail()->delete();

        $page = 'alternative.index';
        $success = '';
        $err = '';
        if($alternative) {
            $success = 'Alternative deleted successfully';
        } else {
            $err = 'Alternative deleted failure';
        }

        return redirect()
            ->route($page)
            ->with('success', $success)
            ->with('err', $err);
    }
}
