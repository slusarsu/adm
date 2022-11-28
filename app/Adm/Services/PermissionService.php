<?php 

namespace App\Adm\Services; 

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Adm\Traits\AdmBaseServiceTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PermissionService
{
    use AdmBaseServiceTrait;

    private Permission $baseModel;

    public function __construct(Permission $baseModel)
    {
        $this->baseModel = $baseModel;
    }

    /**
     * @param Request $request
     * @param int $paginate
     * @param bool $trashed
     * @return LengthAwarePaginator
     */
    public function getTableData(Request $request, bool $trashed = false): LengthAwarePaginator
    {
        $filter = $request->get('filter') ?? 'id';
        $search = $request->get('search') ?? '';
        $order = $request->get('order') ?? 'desc';
        $paginate = $request->get('itemsPerPage') ?? 10;

        $query = $this->baseQuery();

        if($trashed) {
            $query = $query->onlyTrashed();
        }

        if($search) {
            $query = $this->search($query, $search, ['name', 'label']);
        }

        return $query->orderBy($filter, $order)->paginate($paginate);
    }

    /**
     * @return array
     */
    public function getAllForSelectForm(): array
    {
        $allItems = $this->getAll();

        $roles = [];

        foreach ($allItems as $item) {
            $roles[] = [
                'title' => $item->label ?? $item->name,
                'value' => $item->id
            ];
        }

        return $roles;
    }
}