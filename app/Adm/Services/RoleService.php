<?php 

namespace App\Adm\Services; 

use App\Models\Role;
use Illuminate\Http\Request;
use App\Adm\Traits\AdmBaseServiceTrait;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RoleService
{
    use AdmBaseServiceTrait;

    private Role $baseModel;

    public function __construct(Role $baseModel)
    {
        $this->baseModel = $baseModel;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data): mixed
    {
        unset($data['permissions']);
        return $this->baseModel::create($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function update($data): mixed
    {
        unset($data['permissions']);
        return $this->baseModel::where('id', $data['id'])->update($data);
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

    /**
     * @param $id
     * @param $permissions
     * @return void
     */
    public function updatePermissions($id, $permissions): void
    {
        $role = $this->baseModel::find($id);
        $role->permissions()->sync($permissions);
    }
}