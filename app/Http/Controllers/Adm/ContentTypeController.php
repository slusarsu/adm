<?php

namespace App\Http\Controllers\Adm;

use App\Adm\Services\ContentTypeService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentTypeController extends Controller
{
    private ContentTypeService $baseService;

    public function __construct(ContentTypeService $baseService)
    {
        $this->baseService = $baseService;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
//        $items = $this->baseService->getTableData($request);
//        $trashedCount = $this->baseService->trashedCount();
        $items = [];
        $trashedCount = [];

        return view('adm.content-type.index', compact('items', 'trashedCount'));
    }
}
