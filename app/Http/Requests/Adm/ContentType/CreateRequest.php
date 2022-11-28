<?php

namespace App\Http\Requests\Adm\ContentType;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'key' => 'required|string|unique:content_types,key',
            'singular_name' => 'required|string',
            'position' => 'required|numeric',
            'enabled' => 'required|boolean',
            'icon' => 'required|string',
        ];
    }
}
