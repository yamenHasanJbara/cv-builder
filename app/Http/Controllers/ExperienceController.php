<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;
use App\Http\Resources\ExperienceResource;
use App\Models\Experience;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;

class ExperienceController extends Controller
{
    /**
     * EducationController constructor.
     */
    public function __construct()
    {
        $this->setConstruct(ExperienceResource::class);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $experiences = QueryBuilder::for(Experience::class)
            ->where('user_id', '=', Auth::id())
            ->get();

        return $this->collection($experiences);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreExperienceRequest $request
     * @return Response
     */
    public function store(StoreExperienceRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $experience = Experience::create($data);

        return $this->resource($experience);
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $experience = Experience::find($id);
        if (!$experience) {
            return $this->error('301', 'NOT FOUND!');
        }

        return $this->resource($experience);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateExperienceRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateExperienceRequest $request, $id)
    {
        $experience = Experience::find($id);
        if (!$experience) {
            return $this->error('301', 'NOT FOUND!');
        }
        $experience->update($request->validated());

        return $this->resource($experience);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $experience = Experience::find($id);
        if (!$experience) {
            return $this->error('301', 'NOT FOUND!');
        }

        $experience->delete();
        return $this->success([], 'deleted Successfully');
    }
}
