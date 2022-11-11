<?php

namespace App\Http\Requests\Role;
use App\Models\ManagementAccess\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class UpdateRoleRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title'=> [
                'required',
                'string',
                'max:255',
                Rule::unique('role')->ignore($this->role),
            ],
        ];
    }
}
