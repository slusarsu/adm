<?php

namespace App\Adm\Configs;

use App\Models\ContentType;

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
                'section' => trans('adm.content_system'),
                'section_id' => 'content_system',

                'items' => [
                    [
                        'item_id' => 'file_manager',
                        'type' => 'link',
                        'title' => trans('adm.file_manager'),
                        'icon' => '<i class="fa fa-folder"></i>',
                        'url' => route('adm.file-manager')
                    ],
                    [
                        'item_id' => 'content_types',
                        'type' => 'link',
                        'title' => trans('adm.content_types'),
                        'icon' => '<i class="fa fa-hdd-o"></i>',
                        'url' => route('adm.content-type')
                    ],
                ],

            ],

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
                        'item_id' => 'settings',
                        'type' => 'link',
                        'title' => trans('adm.settings'),
                        'icon' => '<i class="fa fa-sliders"></i>',
                        'url' => route('adm.settings')
                    ],
                    [
                        'item_id' => 'menus',
                        'type' => 'link',
                        'title' => trans('adm.menus'),
                        'icon' => '<i class="fa fa-list-ul"></i>',
                        'url' => route('adm.menu')
                    ],

                ],

            ],

            $this->getContentTypeMenu(),

        ];
    }

    private function getContentTypeMenu()
    {
        $contentTypes = ContentType::query()->where('enabled', true)->orderBy('position')->get();

        $items = [];

        foreach ($contentTypes as $item) {
            $items[] = [
                'item_id' => $item->key,
                'type' => 'link',
                'title' => $item->name,
                'icon' => $item->icon,
                'url' => route('adm.file-manager')
            ];
        }

        return [
            'section' => trans('adm.content_types'),
            'section_id' => 'adm_system',

            'items' => $items
        ];


    }
}