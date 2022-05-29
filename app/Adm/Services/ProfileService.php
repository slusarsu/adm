<?php 

namespace App\Adm\Services; 

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ProfileService
{
    private Profile $baseModel;

    /**
     * @param Profile $baseModel
     */
    public function __construct(Profile $baseModel)
    {
        $this->baseModel = $baseModel;
    }

    /**
     * @param $id
     * @return Model|Builder
     */
    public function getProfileByUserId($id): Model|Builder
    {
        $profile = $this->baseModel::where('user_id', $id)->with('user')->first();

        if(!$profile) {
            $profile = $this->baseModel::create(['user_id' => $id]);
            $profile = $profile->load('user');
        }

        return $profile;
    }

    public function update($date)
    {
        return $this->baseModel::where('id', $date['id'])->update($date);
    }

}