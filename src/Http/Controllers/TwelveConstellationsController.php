<?php

namespace Jubilee\Click108\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Jubilee\Click108\Http\Requests\IndexRequest;
use Jubilee\Click108\Http\Requests\InfoRequest;
use Jubilee\Click108\Services\TwelveConstellationsService;

class TwelveConstellationsController extends Controller
{
    /** @var TwelveConstellationsService $service */
    private $service;

    /**
     * TwelveConstellationsController constructor.
     * @param TwelveConstellationsService $service
     */
    public function __construct(TwelveConstellationsService $service)
    {
        $this->service = $service;
    }

    /***
     * @param IndexRequest $request
     * @return \Illuminate\View\View
     */
    public function index(IndexRequest $request): View
    {
        $lists = $this->service->lists($request);

        return view('twelve_constellations.index', compact('lists'));
    }

    /**
     * @param InfoRequest $request
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function info(InfoRequest $request)
    {
        $info = $this->service->info($request);

        return is_null($info) ? redirect()->back()->withErrors('查無資料') :
            view('twelve_constellations.info', compact('info'));
    }
}
