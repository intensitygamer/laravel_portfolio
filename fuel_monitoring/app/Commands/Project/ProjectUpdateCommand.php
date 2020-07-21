<?php

namespace App\Commands\Project;

use Illuminate\Http\Request;
use App\Repositories\Project\ProjectRepository;
use Core\Usecase\Project\ProjectUpdate;

class ProjectUpdateCommand
{
    private $id;
    private $data;
    protected $request;

    public function __construct($id, Request $request)
    {
        $this->id = $id;
        $this->data = $request->all();
        $this->request = $request;
    }

    public function execute()
    {
        $usecase = new ProjectUpdate(new ProjectRepository);

        return $usecase->handle($this->id, $this->request );
    }
}
