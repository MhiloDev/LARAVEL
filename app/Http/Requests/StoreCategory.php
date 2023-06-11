<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
    public function rules(): array
    {
        return [
        'name' => 'required|min:3',
        'description' => 'required|max:200',
        ];
    }

/*     public function attributes(){
        return[
            'name' => 'nombre de la categoria',
            'description' => 'descripcion de la categoria',
        ];
    } */

    public function messages()
    {
        return [
            'name.required' => 'Es necesario ingresar un nombre para la categoria',
            'name.min' => 'El nombre de la categoria debe conterner al menos 3 caracteres',
            'description.required' => 'Es necesario ingresar una descripcion para la categoria',
            'description.max' => 'La descripcion de la categoria solo admite 200 caracteres',
        ];
    }
}
