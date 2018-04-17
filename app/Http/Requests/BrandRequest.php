<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'media_id' => 'required|numeric'
        ];

        if($this->isMethod('PUT'))
        {
            $arr = [
                'name' => 'required|max:255',
                'description' => 'required|max:255',
                'media_id' => 'numeric'
            ];
            return $arr;
        }
    }
}
