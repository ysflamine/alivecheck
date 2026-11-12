<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;/* por defecto es false, pero en este caso lo permitimos ya que no tngo login aun */
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //aqui se definen las reglas de validación para los campos del formulario
            'name' => ['required', 'string', 'max:255'],
            'target' => ['required', 'string', 'max:255', 'url'],
        ];
    }
}
