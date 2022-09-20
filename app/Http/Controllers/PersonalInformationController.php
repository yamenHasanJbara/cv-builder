<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonalInformationRequest;
use App\Http\Requests\UpdatePersonalInformationRequest;
use App\Http\Resources\PersonalInformationResource;
use App\Models\PersonalInformation;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class PersonalInformationController extends Controller
{

    /**
     * PersonalInformationController constructor.
     */
    public function __construct()
    {
        $this->setConstruct(PersonalInformationResource::class);
    }


    /**
     * Store a newly created resource in storage.
     * @param StorePersonalInformationRequest $request
     * @return void
     */
    public function store(StorePersonalInformationRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $personalInformation = PersonalInformation::create($data);

        return $this->resource($personalInformation);
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $personalInformation = PersonalInformation::find($id);
        if (!$personalInformation) {
            return $this->error('301', 'NOT FOUND!');
        }
        return $this->resource($personalInformation);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdatePersonalInformationRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdatePersonalInformationRequest $request, $id)
    {
        $personalInformation = PersonalInformation::find($id);
        if (!$personalInformation) {
            return $this->error('301', 'NOT FOUND!');
        }

        $personalInformation->update($request->validated());

        return $this->resource($personalInformation);
    }

}
