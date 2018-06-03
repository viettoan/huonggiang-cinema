<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CinemaRequest extends FormRequest
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
        if ($this->isMethod('PUT')) {
            $arr = [
                'cinema_system_id' => 'required|numeric',
                'city_id' => 'required|numeric',
                'name' => 'required|max:255' ,
                'address' => 'required|max:255',
                'description' => 'required',
                'media' => 'max:10000',
                'status' => 'required|numeric',
                'location' => 'required|max:255',
            ];
            
            return $arr;
        }
        return [
            'cinema_system_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'name' => 'required|max:255' ,
            'address' => 'required|max:255',
            'description' => 'required',
            'media' => 'required|max:10000',
            'status' => 'required|numeric',
            'location' => 'required|max:255',
        ];
    }
}
