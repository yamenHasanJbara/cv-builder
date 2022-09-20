<?php

namespace App\Http\Resources;

use App\Constants\PersonalInformationConstant;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class PersonalInformationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return
            [
                'id' => $this->id,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'city' => $this->city,
                'country' => $this->country,
                'phone' => $this->phone,
                'nationality' => $this->nationality,
                'gender' => $this->getGenderString($this->gender),
                'head_line' => $this->head_line,
                'about_me' => $this->about_me,
                'user' => $this->user
            ];
    }

    private function getGenderString($gender)
    {
        return PersonalInformationConstant::getGender()[$gender];
    }
}
