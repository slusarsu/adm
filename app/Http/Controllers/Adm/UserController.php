<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Adm\Services\UserService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use App\Http\Requests\Adm\Language\CreateRequest;
use App\Http\Requests\Adm\Language\UpdateRequest;

class UserController extends Controller
{
    private UserService $baseService;

    public function __construct(UserService $userService)
    {
        $this->baseService = $userService;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $items = $this->baseService->getTableData($request);
        $trashedCount = $this->baseService->trashedCount();

        return view('adm.user.index', compact('items', 'trashedCount'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function trashed(Request $request): Factory|View|Application
    {
        $items = $this->baseService->getTableData($request,true);

        return view('adm.user.trashed', compact('items'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('adm.user.create');
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $requestData = $request->validated();

        $item = $this->baseService->store($requestData);

        return redirect()->route('adm.user-edit', $item->id)->with('success', trans('adm.created_successfully'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return Factory|View|Application
     */
    public function edit(Request $request, $id): Factory|View|Application
    {
        $item = $this->baseService->getById($id);
        return view('adm.user.edit', compact('item'));
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

    public function trash(Request $request, $id): RedirectResponse
    {
        $this->baseService->toTrash([$id]);
        return back()->with('success', trans('adm.trashed_success'));
    }

    public function remove(Request $request, $id): RedirectResponse
    {
        $this->baseService->remove([$id]);
        return back()->with('success', trans('adm.removed_successfully'));
    }

    public function restore(Request $request, $id): RedirectResponse
    {
        $this->baseService->restoreTrashed([$id]);
        return back()->with('success', trans('adm.restored_successfully'));
    }

    public function bulkTrash(Request $request): RedirectResponse
    {
        $ids = explode(',', $request->get('ids'));
        $this->baseService->toTrash($ids);
        return back()->with('success', trans('adm.trashed_success'));
    }

    public function bulkRemove(Request $request): RedirectResponse
    {
        $ids = explode(',', $request->get('ids'));
        $this->baseService->remove($ids);
        return back()->with('success', trans('adm.removed_successfully'));
    }

    public function bulkRestore(Request $request): RedirectResponse
    {
        $ids = explode(',', $request->get('ids'));
        $this->baseService->restoreTrashed($ids);
        return back()->with('success', trans('adm.restored_successfully'));
    }
}
