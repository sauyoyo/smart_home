<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return 
        [
            'name' => 'required|max:255',
            'description' => 'required',
            'qty' => 'required|max:255',
            'price' => 'required|max:255',
            'brand_id' => 'required|numeric',
            'status' => 'required|numeric',
            'media_id' => 'required|numeric'
        ];  
        if($this->isMethod('PUT'))
        {
            $arr = [
                'name' => 'required|max:255',
                'description' => 'required',
                'qty' => 'required|max:255',
                'price' => 'required|max:255',
                'brand_id' => 'required|numeric',
                'status' => 'required|numeric',
                'media_id' => 'numeric',
            ];
        }
        return $arr;
    }
}
