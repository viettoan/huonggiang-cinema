<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
                'title' => 'required|max:255',
                'description' => 'required',
                'content' => 'required',
                'media' => 'required|max:10000',
                'status' => 'required|numeric',
            ];
            
            return $arr;
        }
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'media' => 'required|max:10000',
            'status' => 'required|numeric',
        ];
    }
}
