<?php

namespace App\Http\Requests;

use App\Traits\JsonErrors;
use Illuminate\Foundation\Http\FormRequest;

class StoreExperienceRequest extends FormRequest
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
                'position_name' => ['required', 'string', 'max:100'],
                'company' => ['required', 'string', 'max:100'],
                'city' => ['required', 'string', 'max:30'],
                'country' => ['required', 'string', 'max:40'],
                'task' => ['required', 'string'],
                'contact_name' => ['string', 'max:40'],
                'contact_email' => ['string', 'max:255'],
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'date', 'after:start_date'],
            ];
    }
}
