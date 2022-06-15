<?php

namespace App\Http\Controllers\Adm;

use App\Adm\Services\AdmSettingsService;
use App\Adm\Services\ProfileService;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdmSettingsController extends Controller
{
    private AdmSettingsService $baseService;

    public function __construct(AdmSettingsService $baseService)
    {
        $this->baseService = $baseService;
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function index(Request $request): Factory|View|Application
    {
        $settings = $this->baseService->getSettings();

        return view('adm.settings', compact('settings'));
    }
}
