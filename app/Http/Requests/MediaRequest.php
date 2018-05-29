<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
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
                'path' => 'max:10000' ,
                'description' => 'required',
                'status' => 'required|numeric',
                'type' => 'numeric'
            ];
            
            return $arr;
        }
        return [
            'path' => 'required|max:10000' ,
            'description' => 'required|max:255',
            'status' => 'required|numeric',
            'type' => 'numeric'
        ];
    }
}
