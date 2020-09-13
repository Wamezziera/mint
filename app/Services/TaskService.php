<?php


namespace App\Services;


use App\Repositories\TaskRepository;
use App\Services\Traits\CrudMethods;
use Illuminate\Support\Facades\Auth;

class TaskService extends AppService
{
    use CrudMethods;

    /**
     * @var TaskRepository
     */
    protected $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public function all($limit = 20)
    {
        return $this->repository
            ->orderBy('created_at')
            ->with(['createdById' => function ($query) {
                return $query->select(['name', 'id']);
            }, 'updatedById' => function ($query) {
                return $query->select(['name', 'id']);
            }])
            ->paginate($limit);
    }

    public function find($id, $skipPresenter = false)
    {
        return $this->repository
            ->with(['createdById', 'updatedById'])
            ->skipPresenter($skipPresenter)
            ->find($id);
    }

    /**
     * @param array $data
     * @param bool $skipPresenter
     * @return mixed
     */
    public function create(array $data, $skipPresenter = false)
    {
        $data['created_by_id'] = Auth::user()->id;
        $data['updated_by_id'] = Auth::user()->id;

        return $this->repository->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @return array|mixed
     */
    public function update(array $data, $id)
    {
        $data['updated_by_id'] = Auth::user()->id;

        return $this->repository->update($data, $id);
    }
}
