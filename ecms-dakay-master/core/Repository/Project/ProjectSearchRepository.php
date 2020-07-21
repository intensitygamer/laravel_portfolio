<?php

namespace Core\Repository\Project;

interface ProjectSearchRepository
{
    public function get_projects(array $filters, $page, $per_page) : array;
}