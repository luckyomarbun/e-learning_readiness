<?php

namespace App\Http\Controllers;

use App\Models\CriteriaComparison;
use App\Http\Requests\StoreCriteriaComparisonRequest;
use App\Http\Requests\UpdateCriteriaComparisonRequest;
use App\Models\Criteria;
use App\Models\PriorityVectorCriteria;
use App\Models\Rank;
use App\Models\ValueWeight;

class CriteriaComparisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criteriaComparisons = CriteriaComparison::with([
            'firstCriterias',
            'secondCriterias',
            'valueWeights'
        ])->get();

        $valueWeights = ValueWeight::all();
        $criterias = Criteria::all();

        if (count($criteriaComparisons) > 0) {
            $firstCriterias = CriteriaComparison::distinct()->get(["first_criteria_id"]);
            $secondCriterias = CriteriaComparison::distinct()->get(["second_criteria_id"]);

            $firstCriteriasN = array();
            foreach ($firstCriterias as $firstCriterion) {
                array_push($firstCriteriasN, $firstCriterion->first_criteria_id);
            }

            $secondCriteriasN = array();
            foreach ($secondCriterias as $secondCriterion) {
                array_push($secondCriteriasN, $secondCriterion->second_criteria_id);
            }

            $criteriasN = array();
            foreach ($criterias as $criteria) {
                array_push($criteriasN, $criteria->id);
            }

            $criteriasCompared = array_unique(array_merge($firstCriteriasN,$secondCriteriasN));
            $diffs = array_diff($criteriasN, $criteriasCompared);
            if (count($diffs) > 0) {
                CriteriaComparison::truncate();
                Rank::truncate();
                PriorityVectorCriteria::truncate();
                $criteriaComparisons = [];
            }


        }


        return view('criteria-comparison.index', [
            'title' => 'Criteria Comparison',
            'active' => 'calculate',
            'criteriaComparisons' => $criteriaComparisons,
            'valueWeights' => $valueWeights,
            'criterias' => $criterias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $criterias = Criteria::all();
        $valueWeights = ValueWeight::all();
        return view('criteria-comparison.index', [
            'title' => 'Criteria Comparison',
            'active' => 'criteria-comparison',
            'criterias' => $criterias,
            'valueWeights' => $valueWeights
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCriteriaComparisonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCriteriaComparisonRequest $request)
    {
        if ($request->type == 'create') {
            $size = count($request->firstCriteria);
            for($i = 0; $i < $size; $i++) {
                $choosen = 'choosen'.($i+1);
                $choosen = $request->$choosen;
                $criteriaComparison = new CriteriaComparison();
                $criteriaComparison->first_criteria_id = $request->firstCriteria[$i];
                $criteriaComparison->value_weight_id = $request->valueWeight[$i];
                $criteriaComparison->choosen = $choosen;
                if ($choosen == 1) {
                    $criteriaComparison->value = $request->valueWeight[$i];
                } else {
                    $criteriaComparison->value = 1/$request->valueWeight[$i];
                }
                $criteriaComparison->second_criteria_id = $request->secondCriteria[$i];
                $criteriaComparison->save();
            }
        } else {
            // @dd($request);
            $size = count($request->firstCriteria);
            for($i = 0; $i < $size; $i++) {
                $choosen = 'choosen'.($i+1);
                $choosen = $request->$choosen;
                // @dump($request->id);
                $criteriaComparison = CriteriaComparison::where('id', $request->id[$i])->first();
                // @dump($criteriaComparison);
                // @dd($request->firstCriteria[$i]);
                $criteriaComparison->first_criteria_id = $request->firstCriteria[$i];
                $criteriaComparison->value_weight_id = $request->valueWeight[$i];
                $criteriaComparison->choosen = $choosen;
                if ($choosen == 1) {
                    $criteriaComparison->value = $request->valueWeight[$i];
                } else {
                    $criteriaComparison->value = 1/$request->valueWeight[$i];
                }
                $criteriaComparison->second_criteria_id = $request->secondCriteria[$i];
                // @dump($criteriaComparison);
                $criteriaComparison->update();
                // @dump($criteriaComparison);
            }
        }

        return redirect('/calculate/criteria-comparison')->with('success', 'Criteria Comparison successfully sumbitted!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CriteriaComparison  $criteriaComparison
     * @return \Illuminate\Http\Response
     */
    public function show(CriteriaComparison $criteriaComparison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CriteriaComparison  $criteriaComparison
     * @return \Illuminate\Http\Response
     */
    public function edit(CriteriaComparison $criteriaComparison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCriteriaComparisonRequest  $request
     * @param  \App\Models\CriteriaComparison  $criteriaComparison
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCriteriaComparisonRequest $request, CriteriaComparison $criteriaComparison)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CriteriaComparison  $criteriaComparison
     * @return \Illuminate\Http\Response
     */
    public function destroy(CriteriaComparison $criteriaComparison)
    {
        //
    }
}
