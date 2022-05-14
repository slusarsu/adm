<?php

namespace App\Http\Controllers\Adm;

use App\Adm\Services\MenuService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct(MenuService $menuService)
    {
    }

    public function index()
    {
        return view('adm.menu.index');
    }

    public function create()
    {
        return view('adm.menu.create');
    }

    public function edit(Request $request)
    {
        return view('adm.menu.edit');
    }

    public function update(Request $request)
    {

    }

    public function delete(Request $request)
    {

    }
}
