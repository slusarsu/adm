<?php

namespace App\Http\Requests\Adm\Profile;

use Illuminate\Foundation\Http\FormRequest;

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
            'id' => 'required|integer',
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'middle_name' => 'nullable|string',
            'avatars' => 'nullable|string',
            'header_image' => 'nullable|string',
            'website' => 'nullable|string',
            'country' => 'nullable|string',
            'city' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'address' => 'nullable|string',
            'birth_day' => 'nullable|date',
            'settings' => 'nullable|array',
            'description' => 'nullable|string',
        ];
    }
}
