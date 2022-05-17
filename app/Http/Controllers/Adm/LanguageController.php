<?php

namespace App\Http\Controllers\Adm;

use App\Adm\Services\LanguageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Adm\Language\CreateRequest;
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
        dd($request);
        return back()->with('success', lang('adm.created_successfully'));
    }

    public function edit(Request $request)
    {
        return view('adm.language.edit');
    }

    public function update(Request $request)
    {

    }

    public function delete(Request $request)
    {

    }
}
