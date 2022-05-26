<?php 

namespace App\Adm\Services; 

use App\Models\Permission;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PermissionService
{
    private Permission $baseModel;

    public function __construct(Permission $baseModel)
    {
        $this->baseModel = $baseModel;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data): mixed
    {
        return $this->baseModel::create($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function update($data): mixed
    {
        return $this->baseModel::where('id', $data['id'])->update($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function getById($data): mixed
    {
        return $this->baseModel::where('id', $data)->first();
    }

    /**
     * @return mixed
     */
    public function trashedCount(): mixed
    {
        return $this->baseQuery()->onlyTrashed()->count();
    }

    /**
     * @param $ids
     * @return mixed
     */
    public function toTrash($ids): mixed
    {
        return $this->baseModel::whereIn('id',$ids)->delete();
    }

    /**
     * @param $ids
     * @return mixed
     */
    public function restoreTrashed($ids): mixed
    {
        return $this->baseModel::whereIn('id', $ids)->restore();
    }

    /**
     * @param $ids
     * @return mixed
     */
    public function remove($ids): mixed
    {
        return $this->baseModel::withTrashed()->whereIn('id', $ids)->forceDelete();
    }

    /**
     * @return Builder
     */
    public function baseQuery(): Builder
    {
        return $this->baseModel::query();
    }

    /**
     * @param $query
     * @param $search
     * @param array $props
     * @return mixed
     */
    public function search($query, $search, array $props = []): mixed
    {
        $query =  $query->where('name', 'LIKE','%'.$search.'%');

        if(!$props) {
            return $query;
        }

        foreach ($props as $prop) {
            $query =  $query->orWhere($prop, 'LIKE','%'.$search.'%');
        }

        return $query;
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
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->baseModel::all();
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