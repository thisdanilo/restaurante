<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = Request::segment(3);

        return [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique(User::class)->ignore($id),
            ],
            'password' => [
                'nullable',
                'confirmed',
                Password::min(8),
            ],
            'active' => 'required|boolean',
        ];
    }
}
