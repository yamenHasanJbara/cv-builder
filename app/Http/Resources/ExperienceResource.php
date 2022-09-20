<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class ExperienceResource extends JsonResource
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
                'position_name' => $this->position_name,
                'company' => $this->company,
                'city' => $this->city,
                'country' => $this->country,
                'task' => $this->task,
                'contact_name' => $this->contact_name,
                'contact_email' => $this->contact_email,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
            ];
    }
}
