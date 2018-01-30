<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if ($this->isMethod('PUT')) {
            $arr = [
                'name' => 'required|max:255' ,
                'email' => 'required|email|unique:users,email,'.$request->id,
                'address' => 'string|string|max:255',
                'gender' => 'required|numeric',
            ];
            
            return $arr;
        }
        return [
            'name' => 'required|max:255' ,
            'email' => 'max:255|unique:users' ,
            'avatar' => 'string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'required|numeric',
            'role' => 'required|numeric',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ];
    }
}
