<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBukuRequest extends FormRequest
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
            'penulis' => 'nullable|string|max:255',
            'penerbit' => 'nullable|string|max:255',
            'tahun_terbit' => 'nullable|integer|min:1900|max:2100',
            'stok' => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required' => 'Judul buku harus diisi.',
            'judul.max' => 'Judul buku tidak boleh lebih dari 255 karakter.',
            'penulis.max' => 'Penulis tidak boleh lebih dari 255 karakter.',
            'penerbit.max' => 'Penerbit tidak boleh lebih dari 255 karakter.',
            'tahun_terbit.min' => 'Tahun terbit tidak valid.',
            'tahun_terbit.max' => 'Tahun terbit tidak valid.',
            'stok.required' => 'Stok buku harus diisi.',
            'stok.min' => 'Stok buku tidak valid.',
        ];
    }
}
