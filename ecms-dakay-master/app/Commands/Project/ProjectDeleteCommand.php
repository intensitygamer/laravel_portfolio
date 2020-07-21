<?php

namespace App\Commands\Project;

use App\Models\Project;
use App\Repositories\Project\ProjectDeleteRepository;
use Core\Usecase\Project\ProjectDelete;

class ProjectDeleteCommand
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function execute()
    {
        $usecase = new LocationDelete(new LocationDeleteRepository);

        $usecase->handle($this->id);
    }
}
