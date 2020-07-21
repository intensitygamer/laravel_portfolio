<?php

namespace App\Commands\User;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Repositories\User\UserSearchRepository;
use App\Transformers\UserTransformer;

use Core\Usecase\User\UserSearch;

class UserSearchCommand
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
            $this->filters['first_name'] = $request->get('q');
            $this->filters['last_name'] = $request->get('q');
            $this->filters['email'] = $request->get('q');
            $this->filters['username'] = $request->get('q');
        }

        if ((bool) $request->get('role'))
            $this->filters['role'] = $request->get('role');

        if ((bool) $request->get('status'))
            $this->filters['status'] = $request->get('status');

        $this->page = $request->get('page', 1);

        $this->transformer = new UserTransformer;
        $this->request = $request;
    }

    public function execute()
    {
        $usecase = new UserSearch(new UserSearchRepository);

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
