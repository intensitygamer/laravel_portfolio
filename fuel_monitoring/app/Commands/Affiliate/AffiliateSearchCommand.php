<?php

namespace App\Commands\Affiliate;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Repositories\Affiliate\AffiliateSearchRepository;
use App\Transformers\AffiliateTransformer;

use Core\Usecase\Affiliate\AffiliateSearch;

class AffiliateSearchCommand
{
    protected $filters;
    protected $page;

    private $transformer;
    private $per_page = 15;

    public function __construct(Request $request)
    {
        $this->filters = [];

        if ($request->get('q', null))
        {
            $this->filters['q'] = $request->get('q');
            $this->filters['name'] = $request->get('q');
            $this->filters['email'] = $request->get('q');
            $this->filters['username'] = $request->get('q');
            $this->filters['affiliate_code'] = $request->get('q');
        }

        if ($request->get('nationality'))
            $this->filters['nationality'] = $request->get('nationality');

        $this->page = $request->get('page', 1);

        $this->transformer = new AffiliateTransformer;
        $this->request = $request;
    }

    public function execute()
    {
        $usecase = new AffiliateSearch(new AffiliateSearchRepository);

        $results = $usecase->handle($this->filters, $this->page);

        if ($results['total'])
            $results['data'] = $this->transformer->transform_collection($results['data']);

        $results = $this->paginate($results['data'], $results['total']);

        return $results;
    }

    protected function paginate($data, $total)
    {
        $p = new \Illuminate\Pagination\LengthAwarePaginator($data, $total, $this->per_page);
        $p->setPath('/manage/users');

        return $p;
    }
}