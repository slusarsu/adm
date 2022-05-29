<?php

namespace App\View\Components\Adm;

use App\Adm\Configs\MenuConfig;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public ?Authenticatable $user;

    private MenuConfig $menu;

    /**
     * @var array[]
     */
    public array $adminMenu;

    public string $roleLabels;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(MenuConfig $menuConfig)
    {
        $this->user = auth()->user();
        $this->menu = $menuConfig;
        $this->adminMenu = $this->menu->getAdminMenu();
        $this->roleLabels = $this->user->getRoleLabelsString();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.adm.sidebar');
    }
}
