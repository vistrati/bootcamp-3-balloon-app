<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactUsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['string', 'email', 'required'],
            'name' => ['min:2', 'required', 'string'],
            'department' => [
                'required',
                'string',
                Rule::in(['administration', 'accounting', 'technicalDepartment', 'logistic']),
            ],
            'districts' => ['required', 'array', 'min:1', 'in:chisinau,orhei,straseni'],
            'message' => ['required', 'string', 'min:10'],
            'readTerms' => ['required'],
        ];
    }
}
