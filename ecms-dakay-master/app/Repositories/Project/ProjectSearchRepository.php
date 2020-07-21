<?php

namespace App\Repositories\Project;

use App\Models\Project as ProjectModel;

use Core\Domain\Entity\User as UserEntity;
use Core\Repository;

class ProjectSearchRepository implements Repository\Project\ProjectSearchRepository
{
    public function get_projects(array $filters, $page, $per_page) : array
    {
        $model = new ProjectModel;
        $projects = $model->with(['location']);

        if (isset($filters['name']))
        {
            $projects->where(function($q) use ($filters) {
                $q->orWhere('name', 'like', '%'. $filters['name'] .'%');
            });
        }

        if (isset($filters['location']))
        {
            $projects->where(function($q) use ($filters) {
                $q->Where('location', '=',  $filters['location'] );
            });
        }

        $projects->orderBy('id', 'desc');

        $projects = $projects->paginate($per_page);

        return $projects->toArray();
    }
}
