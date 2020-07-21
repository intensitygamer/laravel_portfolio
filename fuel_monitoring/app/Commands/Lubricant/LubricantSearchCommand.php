<?php

namespace App\Commands\Lubricant;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Repositories\Lubricant\LubricantRepository;
use App\Transformers\LubricantTransformer;

use Core\Usecase\Lubricant\LubricantSearch;

class LubricantSearchCommand
{
    protected $filters;
    protected $page;
    protected $type;

    private $transformer;
    private $per_page = 50;

    public function __construct(Request $request)
    {
        $this->filters = [];

        if ($request->get('transaction', null))
        {
            $this->filters['transaction'] = $request->get('transaction');
        }

        if ($request->get('location', null))
        {
            $this->filters['location'] = $request->get('location');
        }

        if ($request->get('operator', null))
        {
            $this->filters['operator'] = $request->get('location');
        }

        if ($request->get('equipment', null))
        {
            $this->filters['equipment'] = $request->get('equipment');
        }

        if ($request->get('oil', null))
        {
            $this->filters['oil'] = $request->get('oil');
        }

        if ($request->get('inout', null))
        {
            $this->filters['inout'] = $request->get('inout');
        }

        if ($request->get('date_from', null) && $request->get('date_to', null))
        {
            $this->filters['date_from'] = $request->get('date_from');
            $this->filters['date_to'] = $request->get('date_to');
        }

        if ($request->get('type', null))
        {
            $this->type = $request->get('type');
        }

        $this->page = $request->get('page', 1);

        $this->transformer = new LubricantTransformer;
        $this->request = $request;
    }

    public function execute()
    {
        $usecase = new LubricantSearch(new LubricantRepository);

        if(!$this->type) {
            $results = $usecase->handle($this->filters, $this->page, $this->per_page);

            if ($results['total'])
                $results['data'] = $this->transformer->transform_collection($results['data']);

            $results = $this->paginate($results['data'], $results['total']);

        } else {

            $results = $usecase->handlePE($this->filters);
            $results = $this->transformer->transform_collection($results);
        }


        return $results;
    }

    protected function paginate($data, $total)
    {
        $p = new \Illuminate\Pagination\LengthAwarePaginator($data, $total, $this->per_page);
        $p->setPath('/lubricant');

        return $p;
    }
}
