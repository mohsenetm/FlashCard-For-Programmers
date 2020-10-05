<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeckRequest extends FormRequest
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
            'title'=>'required',
            'time_period'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'وارد کردن متن الزامی است',
            'time_period.required'=>'وارد کردن دوره زمانی الزامی است'
        ];
    }
}
