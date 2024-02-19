<?php

namespace App\Http\Requests;

use App\Models\Categoria;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriaRequest extends FormRequest
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
        if ($this->method() === 'PUT' or 'PATCH') {
            $rules = [
                'nome' => [
                    'required', 
                    'min:3', 
                    'max:255', 
                    Rule::unique(Categoria::class)->ignore($this->id)]
            ];
        }

        $rules = [
            'nome' => [
                'required', 
                'min:3', 
                'max:255', 
                Rule::unique(Categoria::class)->where('deleted_at',null)
            ],
        ];

        return $rules;
    }
}
