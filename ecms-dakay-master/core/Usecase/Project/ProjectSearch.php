<?php

namespace Core\Usecase\Project;

use Core\Repository\Project\ProjectSearchRepository;

class ProjectSearch
{
    protected $repository;

    public function __construct(ProjectSearchRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($filters, $page = 1, $per_page = 15)
    {
        $projects = $this->repository->get_projects($filters, $page, $per_page);

        return $projects;
    }
}