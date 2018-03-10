<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'name'       =>    'required|min:3|max:100',
            'number'     =>    'required|numeric',
            'category'   =>    'required',
            'description'=>    'min:3|max:1000'
        ];
    }

    public function messages(){
        return [
            'name.required'         =>  "O campo Nome é de preenchimento orbigatório.",
            'name.min'         =>  "O campo Nome precisa ter pelo menos 3 caracteres.",
            'name.max'         =>  "O campo Nome precisa ter no máximo 100 caracteres.",
            'number.required'         =>  "O campo Número é de preenchimento orbigatório.",
            'number.numeric'         =>  "O campo Número precisa conter apenas número",
            'category.required'         =>  "O campo Categoria é de preenchimento orbigatório.",
            'description.min'         =>  "O campo Descrição precisa ter pelo menos 3 caracteres.",
            'description.max'         =>  "O campo Descrição precisa ter no máximo 1000 caracteres",
        ];
    }
}
