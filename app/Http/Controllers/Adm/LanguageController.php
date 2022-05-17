<?php

namespace App\Http\Controllers\Adm;

use App\Adm\Services\LanguageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Adm\Language\CreateRequest;
use App\Http\Requests\Adm\Language\UpdateRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    private LanguageService $languageService;

    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('adm.language.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('adm.language.create');
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $requestData = $request->validated();

        $item = $this->languageService->store($requestData);

        return redirect()->route('adm.language-edit', $item->id)->with('success', trans('adm.created_successfully'));
    }

    public function edit(Request $request, $id): Factory|View|Application
    {
        $item = $this->languageService->getById($id);
        return view('adm.language.edit', compact('item'));
    }

    public function update(UpdateRequest $request)
    {
        $requestData = $request->validated();
        $this->languageService->update($requestData);
        return back()->with('success', trans('adm.updated_successfully'));
    }

    public function delete(Request $request)
    {

    }
}
