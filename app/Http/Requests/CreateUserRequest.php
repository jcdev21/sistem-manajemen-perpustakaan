<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'jenis_pengguna' => 'required|in:siswa,dosen',
            'alamat' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama pengguna harus diisi.',
            'jenis_pengguna.required' => 'Jenis pengguna harus dipilih.',
            'jenis_pengguna.in' => 'Jenis pengguna tidak valid.',
            'alamat.max' => 'Alamat tidak boleh lebih dari 255 karakter.',
            'no_telepon.max' => 'Nomor telepon tidak boleh lebih dari 20 karakter.',
        ];
    }
}
