<?php

namespace App\Http\Controllers;

use App\Models\AlternativeComparison;
use App\Models\PriorityVectorAlternative;
use App\Models\Rank;
use App\Models\ValueWeight;
use App\Models\Criteria;
use App\Http\Requests\StoreAlternativeComparisonRequest;
use App\Http\Requests\UpdateAlternativeComparisonRequest;
use App\Models\Alternative;

class AlternativeComparisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternativeComparisons = AlternativeComparison::with([
            'firstAlternatives',
            'secondAlternatives',
            'criterias',
            'valueWeights'
        ])->get();

        $valueWeights = ValueWeight::all();
        $criterias = Criteria::all();
        $alternatives = Alternative::all();

        if (count($alternativeComparisons) > 0) {
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
                PriorityVectorAlternative::truncate();
                $alternativeComparisons = [];
            }
        }

        return view('alternative-comparison.index', [
            'title' => 'Alternative Comparison',
            'active' => 'calculate',
            'alternativeComparisons' => $alternativeComparisons,
            'valueWeights' => $valueWeights,
            'criterias' => $criterias,
            'alternatives' => $alternatives
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlternativeComparisonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlternativeComparisonRequest $request)
    {
        $criteriaName = Criteria::where('id', $request->criteria)->first(["name"]);
        if ($request->type == 'create') {
            $size = count($request->firstAlternatives);
            for($i = 0; $i <= $size-1; $i++) {
                $choosen = 'choosen'.($i+1);
                $choosen = $request->$choosen;
                $alternativeComparison = new AlternativeComparison();
                $alternativeComparison->first_alternative_id = $request->firstAlternatives[$i];
                $alternativeComparison->value_weight_id = $request->valueWeights[$i];
                $alternativeComparison->choosen = $choosen;
                if ($choosen == 1) {
                    $alternativeComparison->value = $request->valueWeights[$i];
                } else {
                    $alternativeComparison->value = 1/$request->valueWeights[$i];
                }
                $alternativeComparison->second_alternative_id = $request->secondAlternatives[$i];
                $alternativeComparison->criteria_id = $request->criteria;
                $alternativeComparison->save();
            }
        } else {
            $size = count($request->firstAlternatives);
            for($i = 0; $i <= $size-1; $i++) {
                $choosen = 'choosen'.($i+1);
                $choosen = $request->$choosen;
                $alternativeComparison = AlternativeComparison::where('id', $request->id[$i])->first();
                $alternativeComparison->first_alternative_id = $request->firstAlternatives[$i];
                $alternativeComparison->value_weight_id = $request->valueWeights[$i];
                $alternativeComparison->choosen = $choosen;
                if ($choosen == 1) {
                    $alternativeComparison->value = $request->valueWeights[$i];
                } else {
                    $alternativeComparison->value = 1/$request->valueWeights[$i];
                }
                $alternativeComparison->second_alternative_id = $request->secondAlternatives[$i];
                $alternativeComparison->criteria_id = $request->criteria;
                $alternativeComparison->update();
            }
        }

        return redirect('/calculate/alternative-comparison')->with('success', 'Alternative Comparison for "' . $criteriaName->name .  '" successfully sumbitted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlternativeComparison  $alternativeComparison
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alternativeComparisons = AlternativeComparison::with([
            'firstAlternatives',
            'secondAlternatives',
            'criterias',
            'valueWeights'
        ])->where('criteria_id', $id)->get();

        // @dd($alternativeComparison);

        $alternatives = Alternative::all();
        $valueWeights = ValueWeight::all();
        $selectedCriteria = Criteria::where('id', $id)->first();

        return view('alternative-comparison.detail', [
            'title' => 'Alternative Comparison',
            'active' => 'alternative-comparison',
            'alternativeComparisons' => $alternativeComparisons,
            'valueWeights' => $valueWeights,
            'criterias' => $selectedCriteria->id,
            'alternatives' => $alternatives,
            'selectedCriteria' => $selectedCriteria
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlternativeComparison  $alternativeComparison
     * @return \Illuminate\Http\Response
     */
    public function edit(AlternativeComparison $alternativeComparison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlternativeComparisonRequest  $request
     * @param  \App\Models\AlternativeComparison  $alternativeComparison
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlternativeComparisonRequest $request, AlternativeComparison $alternativeComparison)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlternativeComparison  $alternativeComparison
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlternativeComparison $alternativeComparison)
    {
        //
    }
}
