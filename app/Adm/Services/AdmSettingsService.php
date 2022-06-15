<?php 

namespace App\Adm\Services; 

use App\Models\AdmSettings;

class AdmSettingsService
{
    private AdmSettings $baseModel;

    /**
     * @param AdmSettings $baseModel
     */
    public function __construct(AdmSettings $baseModel)
    {
        $this->baseModel = $baseModel;
    }

    /**
     * @return array
     */
    public function getSettings(): array
    {
        return [];
    }
}