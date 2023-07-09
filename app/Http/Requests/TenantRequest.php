<?php

namespace App\Http\Requests;

use App\Models\Tenant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TenantRequest extends FormRequest
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
            'legal_name' => 'required',
            'trade_name' => 'required',
            'cnpj' => [
                'required',
                Rule::unique(Tenant::class)->ignore($id),
            ],
            'im' => 'required|max_digits:11|numeric',
            'ie' => 'required|max_digits:14|numeric',
            'email' => 'required|email',
            'phone' => 'required|min:14|max:15',
            'active' => 'required|boolean',
        ];
    }
}
