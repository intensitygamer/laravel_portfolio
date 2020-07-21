<?php

namespace Core\Repository\Project;

use Illuminate\Http\Request;

interface ProjectRepository
{
    public function get_projects();
    public function get_project_by_id($project_id);
    public function save_project(array $project);
    public function update_project($project_id, Request $data );
    public function delete_project($project_id);

}