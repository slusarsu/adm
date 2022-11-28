<?php 

namespace App\Adm\Services; 

use App\Models\ContentType;
use Illuminate\Http\Request;
use App\Adm\Traits\AdmBaseServiceTrait;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ContentTypeService
{
    use AdmBaseServiceTrait;

    private ContentType $baseModel;

    public function __construct(ContentType $baseModel)
    {
        $this->baseModel = $baseModel;
    }

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
            $query = $this->search($query, $search, ['name', 'key']);
        }

        return $query->orderBy($filter, $order)->paginate($paginate);
    }

}