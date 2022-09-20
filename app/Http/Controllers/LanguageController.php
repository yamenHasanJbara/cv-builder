<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use App\Http\Resources\LanguageResource;
use App\Models\Language;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;

class LanguageController extends Controller
{

    /**
     * LanguageController constructor.
     */
    public function __construct()
    {
        $this->setConstruct(LanguageResource::class);
    }

    /**
     * Display a listing of the resource.
     * @return mixed
     */
    public function index()
    {
        $languages = QueryBuilder::for(Language::class)
            ->get();

        return $this->collection($languages);
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreLanguageRequest $request
     * @return Response
     */
    public function store(StoreLanguageRequest $request)
    {
        $language = Language::create($request->validated());

        return $this->resource($language);
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $language = Language::find($id);
        if (!$language) {
            return $this->error('301', 'NOT FOUND!');
        }
        return $this->resource($language);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateLanguageRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateLanguageRequest $request, $id)
    {
        $language = Language::find($id);
        if (!$language) {
            return $this->error('301', 'NOT FOUND!');
        }

        $language->update($request->validated());
        return $this->resource($language);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $language = Language::find($id);
        if (!$language) {
            return $this->error('301', 'NOT FOUND!');
        }
        $language->delete();

        return $this->success([], 'deleted Successfully');
    }
}
