<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Http\Resources\EducationResource;
use App\Models\Education;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;

class EducationController extends Controller
{

    /**
     * EducationController constructor.
     */
    public function __construct()
    {
        $this->setConstruct(EducationResource::class);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $educations = QueryBuilder::for(Education::class)
            ->where('user_id', '=', Auth::id())
            ->get();

        return $this->collection($educations);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreEducationRequest $request
     * @return Response
     */
    public function store(StoreEducationRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $education = Education::create($data);

        return $this->resource($education);
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $education = Education::find($id);
        if (!$education) {
            return $this->error('301', 'NOT FOUND!');
        }

        return $this->resource($education);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateEducationRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateEducationRequest $request, $id)
    {
        $education = Education::find($id);
        if (!$education) {
            return $this->error('301', 'NOT FOUND!');
        }
        $education->update($request->validated());

        return $this->resource($education);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $education = Education::find($id);
        if (!$education) {
            return $this->error('301', 'NOT FOUND!');
        }

        $education->delete();
        return $this->success([], 'deleted Successfully');
    }
}
