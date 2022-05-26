<?php

namespace App\Http\Controllers\Adm;

use App\Adm\Services\PermissionService;
use App\Adm\Services\RoleService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Adm\Role\CreateRequest;
use App\Http\Requests\Adm\Role\UpdateRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private RoleService $baseService;

    private PermissionService $permissionService;

    public function __construct(RoleService $baseService, PermissionService $permissionService)
    {
        $this->baseService = $baseService;
        $this->permissionService = $permissionService;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $items = $this->baseService->getTableData($request);

        $trashedCount = $this->baseService->trashedCount();

        return view('adm.role.index', compact('items', 'trashedCount'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function trashed(Request $request): Factory|View|Application
    {
        $items = $this->baseService->getTableData($request,true);

        return view('adm.role.trashed', compact('items'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $permissions = $this->permissionService->getAllForSelectForm();

        return view('adm.role.create', compact('permissions'));
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $requestData = $request->validated();

        $item = $this->baseService->store($requestData);

        $permissions = $requestData['permissions'] ?? [];

        $this->baseService->updatePermissions($item->id, $permissions);

        return redirect()->route('adm.role-edit', $item->id)->with('success', trans('adm.created_successfully'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return Factory|View|Application
     */
    public function edit(Request $request, $id): Factory|View|Application
    {
        $item = $this->baseService->getById($id);

        $permissions = $this->permissionService->getAllForSelectForm();

        $permissionSelected = $item->permissions->pluck('id')->toArray();

        return view('adm.role.edit', compact('item', 'permissions', 'permissionSelected'));
    }

    /**
     * @param UpdateRequest $request
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request): RedirectResponse
    {
        $requestData = $request->validated();

        $this->baseService->update($requestData);

        $permissions = $requestData['permissions'] ?? [];

        $this->baseService->updatePermissions($requestData['id'], $permissions);

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
