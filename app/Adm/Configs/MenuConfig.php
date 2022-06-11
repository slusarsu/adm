<?php

namespace App\Adm\Configs;

class MenuConfig
{
    /**
     * @var array[]
     */
    private array $adminMenu;

    public function __construct()
    {
        $this->adminMenu = $this->adminMenuStructure();
    }

    public function getAdminMenu(): array
    {
        return $this->adminMenu;
    }

    private function adminMenuStructure(): array
    {
        return [
            [
                'section' => trans('adm.adm_system'),
                'section_id' => 'adm_system',

                'items' => [
                    [
                        'item_id' => 'users',
                        'type' => 'dropdown',
                        'title' => trans('adm.users_system'),
                        'icon' => '<i data-feather="users"></i>',
                        'items' => [
                            [
                                'title' => trans('adm.users'),
                                'url' => route('adm.user'),
                            ],
                            [
                                'title' => trans('adm.roles'),
                                'url' => route('adm.role'),
                            ],
                            [
                                'title' => trans('adm.permissions'),
                                'url' => route('adm.permission'),
                            ],
                        ]
                    ],
                    [
                        'item_id' => 'languages',
                        'type' => 'link',
                        'title' => trans('adm.languages'),
                        'icon' => '<i class="fa fa-language"></i>',
                        'url' => route('adm.language')
                    ],
                    [
                        'item_id' => 'menus',
                        'type' => 'link',
                        'title' => trans('adm.menus'),
                        'icon' => '<i class="fa fa-list-ul"></i>',
                        'url' => route('adm.menu')
                    ],
                    [
                        'item_id' => 'menus',
                        'type' => 'link',
                        'title' => trans('adm.file_manager'),
                        'icon' => '<i class="fa fa-folder"></i>',
                        'url' => route('adm.file-manager')
                    ],
                ],

            ]
        ];
    }
}