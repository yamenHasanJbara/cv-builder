<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;

class SkillController extends Controller
{

    /**
     * SkillController constructor.
     */
    public function __construct()
    {
        $this->setConstruct(SkillResource::class);
    }

    /**
     * Display a listing of the resource.
     * @return mixed
     */
    public function index()
    {
        $skills = QueryBuilder::for(Skill::class)
            ->get();

        return $this->collection($skills);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreSkillRequest $request
     * @return Response
     */
    public function store(StoreSkillRequest $request)
    {
        $skill = Skill::create($request->validated());

        return $this->resource($skill);
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $skill = Skill::find($id);
        if (!$skill) {
            return $this->error('301', 'NOT FOUND!');
        }
        return $this->resource($skill);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateSkillRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateSkillRequest $request, $id)
    {
        $skill = Skill::find($id);
        if (!$skill) {
            return $this->error('301', 'NOT FOUND!');
        }

        $skill->update($request->validated());
        return $this->resource($skill);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);
        if (!$skill) {
            return $this->error('301', 'NOT FOUND!');
        }
        $skill->delete();

        return $this->success([], 'deleted Successfully');
    }
}
