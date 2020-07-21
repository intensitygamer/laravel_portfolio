<?php

namespace App\Commands\SubContractorWork;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Repositories\SubContractorWork\SubContractorWorkRepository;
use App\Transformers\SubContractorWorkTransformer;

use Core\Usecase\SubContractorWork\SubContractorWorkAudit;

class SubContractorWorkAuditCommand
{
    protected $filters;
    protected $page;

    private $transformer;
    private $per_page = 15;

    public function __construct(Request $request)
    {
        $this->filters = [];

        if ($request->get('subcontractor', null))
        {
            $this->filters['subcontractor'] = $request->get('subcontractor');
        }

        if ($request->get('date_from', null) && $request->get('date_to', null))
        {
            $this->filters['date_from'] = $request->get('date_from');
            $this->filters['date_to'] = $request->get('date_to');
        }

        $this->page = $request->get('page', 1);

        $this->transformer = new SubContractorWorkTransformer;
        $this->request = $request;
    }

    public function execute()
    {
        $usecase = new SubContractorWorkAudit(new SubContractorWorkRepository);

        $results = $usecase->handle($this->filters, $this->page, $this->per_page);

        if(!empty($results)){

            if ($results['total'])
                $results['data'] = $this->transformer->transform_collection($results['data']);

            $results = $this->paginate($results['data'], $results['total']);
        }

        return $results;
    }

    protected function paginate($data, $total)
    {
        $p = new \Illuminate\Pagination\LengthAwarePaginator($data, $total, $this->per_page);
        $p->setPath('/subcontractor/work');

        return $p;
    }
}
