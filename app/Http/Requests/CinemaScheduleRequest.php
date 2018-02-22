<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CinemaScheduleRequest extends FormRequest
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
        $arr = [
            'cinema_id' => 'required|numeric',
            'movie_id' => 'required|numeric',
            'schedule_id' => 'required|numeric',
            'price' => 'required|numeric',
        ];
        
        return $arr;
    }
}
