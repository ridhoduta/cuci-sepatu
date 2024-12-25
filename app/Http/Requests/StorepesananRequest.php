<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorepesananRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'kontak' => 'required|numeric',
            'layanan_id' => 'required|integer|exists:layanan,id',
            'jenis_barang' => 'required|integer|exists:jenis_barang,id',
            'merkBarang' => 'required|string|max:255',
            'totalHarga' => 'required|numeric|min:0'
        ];
    }
    public function messages()
    {
        return [
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa string.',
            'email.required' => 'Email harus diisi.',
            'kontak.required' => 'Kontak harus diisi.',
            'kontak.numeric' => 'Kontak harus berupa angka.',
            'layanan_id.required' => 'Layanan harus dipilih.',
            'jenis_barang.required' => 'Jenis barang harus dipilih.',
            'merkBarang.required' => 'Merk barang harus diisi.'
        ];
    }
}
