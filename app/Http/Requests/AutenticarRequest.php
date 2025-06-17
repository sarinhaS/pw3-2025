<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutenticarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
<<<<<<< HEAD
        return false;
=======
        return true;
>>>>>>> 89b648e6b4a02f855ac6e3360c6b4601fe7cfa3e
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
<<<<<<< HEAD
            'password' => 'required',
=======
            'password' => 'required|confirmed',
>>>>>>> 89b648e6b4a02f855ac6e3360c6b4601fe7cfa3e
        ];
    }
}
