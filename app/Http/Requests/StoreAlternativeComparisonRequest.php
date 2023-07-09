<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlternativeComparisonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            'type' => 'required',
            'id' => 'array',
            'firstAlternatives' => 'required|array',
            'valueWeights' => 'required|array',
            'secondAlternatives' => 'required|array',
            'criteria' => 'required'
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
            'firstAlternatives.required' => 'First Alternative is required!',
            'firstAlternatives.array' => 'First Alternative is required!',
            'valueWeights.required' => 'Value Weight is required!',
            'valueWeights.array' => 'Value Weight is required!',
            'secondAlternatives.required' => 'Second Alternative is required!',
            'secondAlternatives.array' => 'Second Alternative is required!',
            'criteria.required' => 'Criteria is required!'
        ];
    }
}
