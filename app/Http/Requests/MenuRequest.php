<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'category_id' => ['required', 'numeric'],
            'name' => ['required'],
            'description' => ['required'],
            'photo' => ['required', 'file', 'mimes:jpg,png,jpeg'],
            'price' => ['required', 'decimal:0,2'],
            'active' => ['required', 'boolean'],
        ];

        if ($this->isMethod('PUT')) {
            $rules['photo'] = ['sometimes', 'required', 'file', 'mimes:jpg,png,jpeg'];
        }

        return $rules;
    }
}
