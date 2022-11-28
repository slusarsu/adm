<?php

namespace App\Http\Requests\Adm\ContentType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'id' => 'required|numeric',
            'singular_name' => 'required|string',
            'position' => 'required|numeric',
            'enabled' => 'required|boolean',
            'icon' => 'required|string',
            Rule::unique('content_types', 'key'),
        ];
    }
}
