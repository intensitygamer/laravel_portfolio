<?php

namespace App\Commands\Equipment;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Repositories\Equipment\EquipmentSearchRepository;
use App\Transformers\EquipmentTransformer;

use Core\Usecase\Equipment\EquipmentSearch;

class EquipmentSearchCommand
{
    protected $filters;
    protected $page;

    private $transformer;
    private $per_page = 50;

    public function __construct(Request $request)
    {
        $this->filters = [];

        if ($request->get('make', null))
        {
            $this->filters['make'] = $request->get('make');
        }

        if ($request->get('type', null))
        {
            $this->filters['type'] = $request->get('type');
        }

        if ($request->get('model', null))
        {
            $this->filters['model'] = $request->get('model');
        }

        if ($request->get('hauling', null))
        {
            $this->filters['hauling'] = $request->get('hauling');
        }

        if ($request->get('code', null))
        {
            $this->filters['code'] = $request->get('code');
        }

        $this->page = $request->get('page', 1);

        $this->transformer = new EquipmentTransformer;
        $this->request = $request;
    }

    public function execute()
    {
        $usecase = new EquipmentSearch(new EquipmentSearchRepository);

        $results = $usecase->handle($this->filters, $this->page, $this->per_page);

        if ($results['total'])
            $results['data'] = $this->transformer->transform_collection($results['data']);

        $results = $this->paginate($results['data'], $results['total']);

        return $results;
    }

    protected function paginate($data, $total)
    {
        $p = new \Illuminate\Pagination\LengthAwarePaginator($data, $total, $this->per_page);
        $p->setPath('/manage/equipments');

        return $p;
    }
}
