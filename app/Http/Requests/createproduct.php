<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createproduct extends FormRequest
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
            'name' => 'required',
            'MainCategory' => 'required',
            'subCategory'=>'required',
            'Price'=>'required',
            'Discount'=>'required',
            'coverfiles'=>'required|image|mimes:jpeg,png,jpg',
            'sidefiles'=>'required|image|mimes:jpeg,png,jpg,',
            'Description'=>'required'
        ];
    }
}
