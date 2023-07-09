<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCriteriaComparisonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array
     */
    public function authorize()
    {
        return [
            'type' => 'required',
            'id' => 'array',
            'choosen' => 'array',
            'firstCriteria' => 'required|array',
            'valueWeight' => 'required|array',
            'secondCriteria' => 'required|array',
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
            'type.required' => 'Type is required',
            'id.array' => 'Id must be array',
            'choosen.array' => 'Choosen must be array',
            'firstCriteria.required' => 'First Criteria is required!',
            'firstCriteria.array' => 'First Criteria is required!',
            'valueWeight.required' => 'Value Weight is required!',
            'valueWeight.array' => 'Value Weight is required!',
            'secondCriteria.required' => 'Second Criteria is required!',
            'secondCriteria.array' => 'Second Criteria is required!',
        ];
    }
}
