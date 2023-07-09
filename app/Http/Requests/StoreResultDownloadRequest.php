<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResultDownloadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array
     */
    public function authorize()
    {
        return [
            'criterias' => 'required',
            'alternatives' => 'required',
            'calculateCriteria' => 'required',
            'calculateAlternatives' => 'required',
            'resultCriteriaPv' => 'required',
            'resultAlternativePv' => 'required',
            'distinctPvAlternative' => 'required',
            'distinctPvCriteria' => 'required',
            'valueResult' => 'required',
            'rank'=> 'required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'criterias.required' => 'Criterias is required',
            'alternatives.required' => 'Alternatives is required',
            'calculateCriteria.required' => 'Calculate Criteria is required',
            'calculateAlternatives.required' => 'Calculate Alternative is required',
            'resultCriteriaPv.required' => 'Result Criteria PV is required',
            'resultAlternativePv.required' => 'Result Alternative PV is required',
            'distinctPvAlternative.required' => 'Distinct PV Alternative is required',
            'distinctPvCriteria.required' => 'Distinct PV Criteria Criteria is required!',
            'valueResult.array' => 'Value Result is required!',
            'rank.required' => 'Rank is required!',
        ];
    }
}
