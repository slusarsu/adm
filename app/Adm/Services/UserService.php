<?php 

namespace App\Adm\Services; 

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Adm\Traits\AdmBaseServiceTrait;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService
{
    use AdmBaseServiceTrait;

    private User $baseModel;

    public function __construct(User $baseModel)
    {
        $this->baseModel = $baseModel;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data): mixed
    {
        $data['password'] = Hash::make($data['password']);
        unset($data['roles']);
        return $this->baseModel::create($data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function update($data): mixed
    {
        if(!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
            unset($data['roles']);
        }
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
            $query = $this->search($query, $search, ['name', 'email']);
        }

        return $query->orderBy($filter, $order)->paginate($paginate);
    }

    /**
     * @param $id
     * @param $roles
     * @return void
     */
    public function updateRoles($id, $roles): void
    {
        $user = $this->baseModel::find($id);
        $user->roles()->sync($roles);
    }
}