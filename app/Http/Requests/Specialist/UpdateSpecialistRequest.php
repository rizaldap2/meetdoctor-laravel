<?php

namespace App\Http\Requests\Specialist;

use App\Models\Operational\Specialist;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class UpdateSpecialistRequest extends FormRequest
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
            'name'=> [
                'required',
                'string',
                'max:255',
                Rule::unique('specialist')->ignore($this->specialist),
            ],
            'price'=> [
                'required',
                'string',
                'max:255',
            ],
        ];
    }
}
