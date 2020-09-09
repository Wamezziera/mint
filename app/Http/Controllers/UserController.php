<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\UserService;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;


class UserController extends Controller
{
    use CrudMethods {
        store as generalStore;
        update as generalUpdate;
    }

    /**
     * @var UserService
     */
    protected $service;

    /**
     * UsersController constructor.
     *
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCreateRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserCreateRequest $request)
    {
        return $this->generalStore($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param string $id
     *
     */
    public function update(UserUpdateRequest $request, $id)
    {
        return $this->generalUpdate($request, $id);
    }


}
