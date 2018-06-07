<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProfileRequest extends FormRequest
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
                'name' => 'max:255' ,
                'email' => 'email|unique:users,email,'.$request->id,
                'address' => 'max:255',
                'gender' => 'numeric',
                'old_password' => 'min:8',
                'password' => 'min:8|confirmed',
                'password_confirmation' => 'min:8'
            ];
            
            return $arr;
        }
    }
}
