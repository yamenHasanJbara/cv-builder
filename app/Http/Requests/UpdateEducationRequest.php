<?php

namespace App\Http\Requests;

use App\Traits\JsonErrors;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEducationRequest extends FormRequest
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
                'name' => ['string', 'max:100'],
                'university' => ['string', 'max:120'],
                'city' => ['string', 'max:30'],
                'country' => ['string', 'max:40'],
                'degree' => ['integer', Rule::in($degreeValidate)],
                'great_point_average' => ['numeric'],
                'start_date' => ['date'],
                'end_date' => ['date', 'after:start_date'],
            ];
    }
}
