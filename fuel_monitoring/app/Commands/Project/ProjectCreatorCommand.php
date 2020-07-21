<?php

namespace App\Commands\Project;

use App\Repositories\Project\ProjectRepository;
use Core\Usecase\Project\ProjectCreator;
use Illuminate\Http\Request;

class ProjectCreatorCommand
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        $data = $this->request;

        $creator = new ProjectCreator(new ProjectRepository);

        $project = $creator->handle($data);

        return $project;
    }
}
