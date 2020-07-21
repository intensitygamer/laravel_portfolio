<?php

namespace App\Commands\Project;

use App\Repositories\Project\ProjectRepository;
use App\Transformers\ProjectTransformer;
use Core\Usecase\Project\ProjectDetail;

class ProjectDetailCommand
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function execute()
    {
        $usecase = new ProjectDetail(new ProjectRepository);

        $project = $usecase->handle($this->id);

        $transformer = new ProjectTransformer;

        return $transformer->transform_item($project);
    }
}