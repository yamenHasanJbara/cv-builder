<?php

namespace App\Http\Requests;

use App\Traits\JsonErrors;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePersonalInformationRequest extends FormRequest
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
        $genderValidation = [1, 2];
        return
            [
                'first_name' => ['required', 'string', 'max:15'],
                'last_name' => ['required', 'string', 'max:15'],
                'city' => ['required', 'string', 'max:15'],
                'country' => ['required', 'string', 'max:30'],
                'phone' => ['required', 'string', 'max:15', Rule::unique('personal_information')],
                'nationality' => ['required', 'string', 'max:40'],
                'gender' => ['required','integer', Rule::in($genderValidation)],
                'head_line' => ['required', 'string', 'max:50'],
                'about_me' => ['required', 'string', 'max:1000'],
            ];
    }
}
