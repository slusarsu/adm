<?php

namespace App\Http\Controllers\Adm;

use App\Http\Requests\Adm\Profile\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Adm\Services\ProfileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use JetBrains\PhpStorm\NoReturn;

class ProfileController extends Controller
{
    private ProfileService $baseService;

    public function __construct(ProfileService $baseService)
    {
        $this->baseService = $baseService;
    }

    /**
     * @param Request $request
     * @param $id
     * @return Factory|View|Application
     */
    public function index(Request $request, $id): Factory|View|Application
    {
        $profile = $this->baseService->getProfileByUserId($id);

        return view('adm.profile.index', compact('profile'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return Factory|View|Application
     */
    public function edit(Request $request, $id): Factory|View|Application
    {
        $item = $this->baseService->getProfileByUserId($id);
        return view('adm.profile.edit', compact('item'));
    }

    /**
     * @param Request $request
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
     * @return Factory|View|Application
     */
    public function settings(Request $request, $id): Factory|View|Application
    {

        $item = $this->baseService->getProfileByUserId($id);

        return view('adm.profile.settings', compact('item'));
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function updateSettings(Request $request): Factory|View|Application
    {
        return view('adm.profile.settings');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function remove(Request $request): RedirectResponse
    {
        return back()->with('success', trans('adm.removed_successfully'));
    }
}
