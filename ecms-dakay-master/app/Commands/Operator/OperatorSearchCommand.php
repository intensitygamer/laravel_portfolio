<?php

namespace App\Commands\Operator;

use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Repositories\Operator\OperatorSearchRepository;
use App\Transformers\OperatorTransformer;

use Core\Usecase\Operator\OperatorSearch;

class OperatorSearchCommand
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

        $this->transformer = new OperatorTransformer;
        $this->request = $request;
    }

    public function execute()
    {
        $usecase = new OperatorSearch(new OperatorSearchRepository);

        $results = $usecase->handle($this->filters, $this->page, $this->per_page);

        if ($results['total'])
            $results['data'] = $this->transformer->transform_collection($results['data']);

        $results = $this->paginate($results['data'], $results['total']);

        return $results;
    }

    protected function paginate($data, $total)
    {
        $p = new \Illuminate\Pagination\LengthAwarePaginator($data, $total, $this->per_page);
        $p->setPath('/manage/operators');

        return $p;
    }
}
