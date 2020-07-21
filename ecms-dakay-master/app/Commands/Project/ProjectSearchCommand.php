<?php

namespace App\Commands\Project;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Repositories\Project\ProjectSearchRepository;
use App\Transformers\ProjectTransformer;

use Core\Usecase\Project\ProjectSearch;

class ProjectSearchCommand
{
    protected $filters;
    protected $page;

    private $transformer;
    private $per_page = 50;

    public function __construct(Request $request)
    {
        $this->filters = [];

        if ($request->get('name', null))
        {
            $this->filters['name'] = $request->get('name');
        }

        if ($request->get('location', null))
        {
            $this->filters['location'] = $request->get('location');
        }

        $this->page = $request->get('page', 1);

        $this->transformer = new ProjectTransformer;
        $this->request = $request;
    }

    public function execute()
    {
        $usecase = new ProjectSearch(new ProjectSearchRepository);

        $results = $usecase->handle($this->filters, $this->page, $this->per_page);

        if ($results['total'])
            $results['data'] = $this->transformer->transform_collection($results['data']);

        $results = $this->paginate($results['data'], $results['total']);

        return $results;
    }

    protected function paginate($data, $total)
    {
        $p = new \Illuminate\Pagination\LengthAwarePaginator($data, $total, $this->per_page);
        $p->setPath('/manage/projects');

        return $p;
    }
}
