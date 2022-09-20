<?php

namespace App\Http\Resources;

use App\Constants\EducationConstant;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class EducationResource extends JsonResource
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
                'name' => $this->name,
                'university' => $this->university,
                'city' => $this->city,
                'country' => $this->country,
                'degree' => $this->getDegree($this->degree),
                'great_point_average' => $this->great_point_average,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
            ];
    }

    private function getDegree($degree)
    {
        return EducationConstant::getDegree()[$degree];
    }
}
