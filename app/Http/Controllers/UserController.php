<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLanguageUserRequest;
use App\Http\Requests\StoreSkillUserRequest;
use App\Http\Resources\UserSkillLanguageResource;
use App\Models\Language;
use App\Models\Skill;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->setConstruct(UserSkillLanguageResource::class);
    }

    /**
     * @param StoreLanguageUserRequest $request
     * @return mixed
     */
    public function storeLanguageUser(StoreLanguageUserRequest $request)
    {
        $language = Language::find($request->get('language_id'));
        $user = Auth::user();
        if (!$user->languages()->where('language_id', $request->get('language_id'))->first()) {

            $user->languages()->attach($language->id, [
                'level' => $request->get('level'),
            ]);
            return $this->resource($user);
        }

        return $this->error('201', 'already Exists');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteLanguageUser(Request $request)
    {
        $user = Auth::user();
        $languageUser = $user->languages()->where('language_id', '=', $request->get('language_id'))->first();
        if (!$languageUser) {
            return $this->error('301', 'NOT FOUND!');
        }
        return $this->deleteLanguageUserObject($request->get('language_id'), $user);
    }

    /**
     * @param $language_id
     * @param $user
     * @return JsonResponse
     */
    private function deleteLanguageUserObject($language_id, $user)
    {
        DB::table('language_user')->where('language_id', '=', $language_id)
            ->where('user_id', '=', $user->id)->delete();

        return $this->success([], 'deleted Successfully');
    }

    /**
     * @param StoreSkillUserRequest $request
     * @return mixed
     */
    public function storeSkillUser(StoreSkillUserRequest $request)
    {
        $skill = Skill::find($request->get('skill_id'));
        $user = Auth::user();
        if (!$user->skills()->where('skill_id', $request->get('skill_id'))->first()) {

            $user->skills()->attach($skill->id, [
                'level' => $request->get('level'),
            ]);
            return $this->resource($user);
        }
        return $this->error('201', 'already Exists');
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteSkillUser(Request $request)
    {
        $user = Auth::user();
        $skillUser = $user->skills()->where('skill_id', '=', $request->get('skill_id'))->first();

        if (!$skillUser) {
            return $this->error('301', 'NOT FOUND!');
        }

        DB::table('skill_')->where('skill_id', '=', $request->get('skill_id'))
            ->where('user_id', '=', $user->id)->delete();

        return $this->success([], 'deleted Successfully');
    }
}
