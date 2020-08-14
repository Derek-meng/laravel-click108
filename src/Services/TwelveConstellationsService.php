<?php

namespace Jubilee\Click108\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Jubilee\Click108\Http\Requests\IndexRequest;
use Jubilee\Click108\Http\Requests\InfoRequest;
use Jubilee\Click108\Repositories\TwelveConstellationsRepo;

class TwelveConstellationsService
{
    /** @var TwelveConstellationsRepo $repo */
    private $repo;

    /**
     * TwelveConstellationsService constructor.
     * @param TwelveConstellationsRepo $repo
     */
    public function __construct(TwelveConstellationsRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param IndexRequest $request
     * @return LengthAwarePaginator
     */
    public function lists(IndexRequest $request): LengthAwarePaginator
    {
        $book = $this->repo->book($request->getPage(), $request->getPerPage());
        $total = $this->repo->total();

        return app(LengthAwarePaginator::class, [
            'items'       => $book,
            'total'       => $total,
            'perPage'     => $request->getPerPage(),
            'currentPage' => $request->getPage(),
            'options'     => [
                'path'     => Paginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        ]);
    }

    /**
     * @param InfoRequest $request
     * @return Model|null
     */
    public function info(InfoRequest $request)
    {
        return $this->repo->find($request->getId());
    }
}
