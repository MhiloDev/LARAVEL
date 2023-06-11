<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'category_id' => 'required',
            'price' => 'required|numeric|min:0',   
        ];
    }

/*     public function attributes(){
        return[
            'name',
            'description',
            'price',   
            'category_id',   
        ];
    } */

    public function messages(){
        return [
        'name.required' => 'Es necesario ingresar un nombre para el producto ',
        'name.min' => 'El nombre para el producto debe conterner al menos 3 caracteres',
        'description.required' => 'Es necesario ingresar una descripcion para el producto ',
        'description.max' => 'La descripcion del producto solo admite 200 caracteres ',
        'price.required' => 'Es necesario ingresar un precio para el producto ',
        'price.min' => 'El valor del producto no puede ser negativo',
        'category.required' => 'Es necesario ingresar una categoria para el producto ',
        ];
    }
}
