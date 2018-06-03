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
                'name' => 'required|max:255' ,
                'time' => 'required|numeric|min:0',
                'release_date' => 'required',
                'directors' => 'required|max:255',
                'actors' => 'required|max:255',
                'description' => 'required',
                'media' => 'max:10000',
                'status' => 'required|numeric',
                'type_id' => 'required',
            ];
            
            return $arr;
        }
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'media' => 'required|max:10000',
            'status' => 'required|numeric',
            'type' => 'required|numeric',
        ];
    }
}
