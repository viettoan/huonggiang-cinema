<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
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
                'cinema_id' => 'required',
                'title' => 'required|max:255' ,
                'description' => 'required',
                'content' => 'required',
                'start' => 'required',
                'end' => 'required',
                'sale' => 'required|numeric|min:0',
                'status' => 'required|numeric',
                'media' => 'max:10000',
            ];
            
            return $arr;
        }
        return [
            'cinema_id' => 'required',
            'title' => 'required|max:255' ,
            'description' => 'required',
            'content' => 'required',
            'start' => 'required',
            'end' => 'required',
            'sale' => 'required|numeric|min:0',
            'status' => 'required|numeric',
            'media' => 'max:10000|required',
        ];
    }
}
