<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required | min:3 |unique:products,name',
            'price'=>'required | numeric | min:0',
            'description'=>'required',
            'photo'=>'required | image | mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id'=>'required | exists:App\Models\Category,id',
        ];
    }
}
