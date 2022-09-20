<?php

namespace App\Http\Requests;

use App\Traits\JsonErrors;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEducationRequest extends FormRequest
{

    use JsonErrors;

    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array<string, mixed>
     */
    public function rules()
    {
        $degreeValidate = [1, 2, 3, 4];
        return
            [
                'name' => ['required', 'string', 'max:100'],
                'university' => ['required', 'string', 'max:120'],
                'city' => ['required', 'string', 'max:30'],
                'country' => ['required', 'string', 'max:40'],
                'degree' => ['required', 'integer', Rule::in($degreeValidate)],
                'great_point_average' => ['numeric'],
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'date', 'after:start_date'],
            ];
    }
}
