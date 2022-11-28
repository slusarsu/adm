<?php 

namespace App\Adm\Services; 

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Adm\Traits\AdmBaseServiceTrait;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MenuService
{
    use AdmBaseServiceTrait;

    private Menu $baseModel;

    public function __construct(Menu $baseModel)
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
            $query = $this->search($query, $search, ['code', 'name', 'native_name']);
        }

        return $query->orderBy($filter, $order)->paginate($paginate);
    }

}