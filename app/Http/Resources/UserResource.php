<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * Class UserResource
 * @package App\Http\Resources
 * @property $id
 * @property $email
 */
class UserResource extends JsonResource
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
                'email' => $this->email,
                'languages'=> $this->languages,
            ];
    }
}
