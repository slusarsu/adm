<?php 

namespace App\Adm\Services; 

use App\Models\Language;

class LanguageService
{
    public function __construct()
    {

    }

    public function store($data)
    {
        return Language::create($data);
    }

    public function update($data)
    {
        return Language::where('id', $data['id'])->update($data);
    }

    public function getById($data)
    {
        return Language::where('id', $data)->first();
    }

}