<?php 

namespace App\Adm\Services; 

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Adm\Traits\AdmBaseServiceTrait;

class LanguageService
{
    use AdmBaseServiceTrait;

    private Language $baseModel;

    public function __construct(Language $baseModel)
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
            $query = $this->search($query, $search, ['name', 'code']);
        }

        return $query->orderBy($filter, $order)->paginate($paginate);
    }


}