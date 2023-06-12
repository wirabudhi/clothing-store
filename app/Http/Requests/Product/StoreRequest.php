<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'outlets_id' => 'required',
            'nama_product' => 'required|max:255',
            'jenis_product' => 'required|max:255',
            'harga' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'ukuran' => 'required|max:255',
            'stok' => 'required|max:255',
            'gambar' => 'required|image|max:5120|mimes:jpg,jpeg,png',
        ];
    }
}
