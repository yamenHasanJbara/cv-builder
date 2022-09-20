<?php

namespace App\Http\Requests;

use App\Traits\JsonErrors;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLanguageUserRequest extends FormRequest
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
        $languageLevelValidation = [1, 2, 3, 4, 5];
        return
            [
                'language_id' => ['required', 'integer', Rule::exists('languages', 'id')],
                'level' => ['required', 'integer', Rule::in($languageLevelValidation)]
            ];
    }
}
