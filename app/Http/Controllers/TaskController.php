<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\TaskService;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;


class TaskController extends Controller
{
    use CrudMethods {
        store as generalStore;
        update as generalUpdate;
    }

    /**
     * @var TaskService
     */
    protected $service;



    /**
     * UsersController constructor.
     *
     * @param TaskService $service
     */
    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TaskCreateRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TaskCreateRequest $request)
    {
        return $this->generalStore($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TaskUpdateRequest $request
     * @param string $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TaskUpdateRequest $request, $id)
    {
        return $this->generalUpdate($request, $id);
    }
}
