<?php

namespace App\Commands\Fuel;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Repositories\Fuel\FuelRepository;
use App\Transformers\FuelTransformer;

use Core\Usecase\Fuel\FuelSearch;

class FuelSearchCommand
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

        if ($request->get('equipment', null))
        {
            $this->filters['equipment'] = $request->get('equipment');
        }

        if ($request->get('operator', null))
        {
            $this->filters['operator'] = $request->get('operator');
        }

        if ($request->get('project', null))
        {
            $this->filters['project'] = $request->get('project');
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

        $this->transformer = new FuelTransformer;
        $this->request = $request;
    }

    public function execute()
    {
        $usecase = new FuelSearch(new FuelRepository);

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
        $p->setPath('/fuel');

        return $p;
    }
}
