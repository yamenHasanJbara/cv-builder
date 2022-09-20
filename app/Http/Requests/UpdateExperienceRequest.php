<?php

namespace App\Http\Requests;

use App\Traits\JsonErrors;
use Illuminate\Foundation\Http\FormRequest;

class UpdateExperienceRequest extends FormRequest
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
        return
            [
                'position_name' => ['string', 'max:100'],
                'company' => ['string', 'max:100'],
                'city' => ['string', 'max:30'],
                'country' => ['string', 'max:40'],
                'task' => ['string'],
                'contact_name' => ['string', 'max:40'],
                'contact_email' => ['email', 'max:255'],
                'start_date' => ['date'],
                'end_date' => ['date', 'after:start_date'],
            ];
    }
}
