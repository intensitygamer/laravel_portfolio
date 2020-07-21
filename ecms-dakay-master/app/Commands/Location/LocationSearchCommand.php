<?php

namespace App\Commands\Location;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Repositories\Location\LocationSearchRepository;
use App\Transformers\LocationTransformer;

use Core\Usecase\Location\LocationSearch;

class LocationSearchCommand
{
    protected $filters;
    protected $page;

    private $transformer;
    private $per_page = 50;

    public function __construct(Request $request)
    {
        $this->filters = [];

        if ($request->get('q', null))
        {
            $this->filters['q'] = $request->get('q');
            $this->filters['name'] = $request->get('q');
        }

        $this->page = $request->get('page', 1);

        $this->transformer = new LocationTransformer;
        $this->request = $request;
    }

    public function execute()
    {
        $usecase = new LocationSearch(new LocationSearchRepository);

        $results = $usecase->handle($this->filters, $this->page, $this->per_page);

        if ($results['total'])
            $results['data'] = $this->transformer->transform_collection($results['data']);

        $results = $this->paginate($results['data'], $results['total']);

        return $results;
    }

    protected function paginate($data, $total)
    {
        $p = new \Illuminate\Pagination\LengthAwarePaginator($data, $total, $this->per_page);
        $p->setPath('/manage/locations');

        return $p;
    }
}
