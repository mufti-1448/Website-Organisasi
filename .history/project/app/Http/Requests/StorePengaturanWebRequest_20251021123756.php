<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePengaturanWebRequest extends FormRequest
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
            'nama_web' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'favicon' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'email' => 'required|email',
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
        ];
    }
}
