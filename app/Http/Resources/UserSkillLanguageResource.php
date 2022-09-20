<?php

namespace App\Http\Resources;

use App\Constants\LanguageConstant;
use App\Constants\SkillConstant;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class UserSkillLanguageResource extends JsonResource
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
                'languages' => $this->getLanguageLevel($this->languages),
                'skills' => $this->getSkillLevel($this->skills)
            ];
    }

    /**
     * @param $languages
     * @return array
     */
    private function getLanguageLevel($languages)
    {
        $languagesArr = [];
        foreach ($languages as $language) {
            $languageArr = [];
            $languageArr[] = $language->name;
            $languageArr[] = LanguageConstant::getLanguageLevel()[$language->pivot->level];
            $languagesArr [] = $languageArr;
        }
        return $languagesArr;
    }

    /**
     * @param $skills
     * @return array
     */
    private function getSkillLevel($skills)
    {
        $skillsArr = [];
        foreach ($skills as $skill) {
            $skillArr = [];
            $skillArr[] = $skill->name;
            $skillArr[] = SkillConstant::getSkillLevel()[$skill->pivot->level];
            $skillsArr [] = $skillArr;
        }
        return $skillsArr;
    }
}
