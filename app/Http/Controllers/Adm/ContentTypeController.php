<?php

namespace App\Http\Controllers\Adm;

use App\Http\Requests\Adm\ContentType\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Adm\Services\ContentTypeService;
use Illuminate\Contracts\Foundation\Application;
use App\Http\Requests\Adm\ContentType\CreateRequest;

class ContentTypeController extends Controller
{
    private ContentTypeService $baseService;

    /**
     * @param ContentTypeService $baseService
     */
    public function __construct(ContentTypeService $baseService)
    {
        $this->baseService = $baseService;
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function index(Request $request): Factory|View|Application
    {
        $items = $this->baseService->getTableData($request);
        $trashedCount = $this->baseService->trashedCount();

        return view('adm.content-type.index', compact('items', 'trashedCount'));
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function trashed(Request $request): Factory|View|Application
    {
        $items = $this->baseService->getTableData($request,true);

        return view('adm.content-type.trashed', compact('items'));
    }

    /**
     * @return View|Factory|Application
     */
    public function create(): View|Factory|Application
    {
        return view('adm.content-type.create');
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $requestData = $request->validated();
        $requestData['user_id'] = $request->user()->id;

        $item = $this->baseService->store($requestData);

        return redirect()->route('adm.content-type-edit', $item->id)
            ->with('success', trans('adm.created_successfully'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return Factory|View|Application
     */
    public function edit(Request $request, $id): Factory|View|Application
    {
        $item = $this->baseService->getById($id);
        return view('adm.content-type.edit', compact('item'));
    }

    /**
     * @param UpdateRequest $request
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request): RedirectResponse
    {
        $requestData = $request->validated();
        $this->baseService->update($requestData);
        return back()->with('success', trans('adm.updated_successfully'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function trash(Request $request, $id): RedirectResponse
    {
        $this->baseService->toTrash([$id]);
        return back()->with('success', trans('adm.trashed_success'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function remove(Request $request, $id): RedirectResponse
    {
        $this->baseService->remove([$id]);
        return back()->with('success', trans('adm.removed_successfully'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function restore(Request $request, $id): RedirectResponse
    {
        $this->baseService->restoreTrashed([$id]);
        return back()->with('success', trans('adm.restored_successfully'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function bulkTrash(Request $request): RedirectResponse
    {
        $ids = explode(',', $request->get('ids'));
        $this->baseService->toTrash($ids);
        return back()->with('success', trans('adm.trashed_success'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function bulkRemove(Request $request): RedirectResponse
    {
        $ids = explode(',', $request->get('ids'));
        $this->baseService->remove($ids);
        return back()->with('success', trans('adm.removed_successfully'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function bulkRestore(Request $request): RedirectResponse
    {
        $ids = explode(',', $request->get('ids'));
        $this->baseService->restoreTrashed($ids);
        return back()->with('success', trans('adm.restored_successfully'));
    }
}
