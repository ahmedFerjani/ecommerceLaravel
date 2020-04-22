<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => 'required',
            'product_code' => 'required',
            'product_price' => 'required',
            'product_info' => 'required',
            'product_image' => 'image|mimes:png,jpg,jpeg|max:10000',
            'product_splprice' => 'required'
        ];
    }
}
