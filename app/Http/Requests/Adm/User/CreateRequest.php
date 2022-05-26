<?php

namespace App\Http\Requests\Adm\User;

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
            'email' => 'required|email|string|unique:users,email',
            'password' => 'required|string',
            'enabled' => 'boolean',
            'roles' => ['nullable', 'array'],
            'roles.*' => ['nullable', 'integer']
        ];
    }

//    public function messages()
//    {
//        return [
//            'name.required' => 'A title is required',
//            'email.required' => 'A message is required',
//        ];
//    }
}
