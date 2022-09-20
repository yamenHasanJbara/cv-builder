<?php

namespace App\Http\Requests;

use App\Models\PersonalInformation;
use App\Traits\JsonErrors;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePersonalInformationRequest extends FormRequest
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
                'first_name' => ['string', 'max:15'],
                'last_name' => ['string', 'max:15'],
                'city' => ['string', 'max:15'],
                'country' => ['string', 'max:30'],
                'phone' => ['string', 'max:15', Rule::unique('personal_information', 'phone')->ignore($this->route('personal'))],
                'nationality' => ['string', 'max:40'],
                'gender' => ['integer', Rule::in($genderValidation)],
                'head_line' => ['string', 'max:50'],
                'about_me' => ['string', 'max:1000'],
            ];
    }
}
