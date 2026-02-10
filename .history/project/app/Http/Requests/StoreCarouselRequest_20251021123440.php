<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarouselRequest extends FormRequest
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
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tombol_text' => 'required|string|max:255',
            'tombol_link' => 'required|url',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
