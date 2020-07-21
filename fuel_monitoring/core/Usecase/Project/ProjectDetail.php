<?php

namespace Core\Usecase\Project;

use Core\Repository\Project\ProjectRepository;
use Core\Validator;
use Core\Exception;

class ProjectDetail
{
    protected $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($project_id)
    {
        $validator = new Validator;

        $validator->setup([ 'id' => $project_id]);

        $validator->add_rule('id', ['required']);

        if (! $validator->is_valid())
            throw new Exception\Validation($validator);

        $project = $this->repository->get_project_by_id($project_id);

        if (! $project)
            throw new Exception\ReportsException('Project do not exists');

        return $project;
    }
}
