<?php

namespace App\Http\Requests\User;

use App\Models\User;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // create middleware from kernel at here
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
            ],
            'email'=> [
                'required',
                'email',
                'max:255',
                'unique:users',
            ],
            'password'=> [
                'string',
                'min:8',
                'max:255',
                'mixedCase',
            ],

            
        ];
    }
}
