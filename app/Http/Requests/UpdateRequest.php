<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'nama_outlet' => 'required|max:255',
            'alamat'    => 'required|max:255',
            'lat'    => 'required',
            'lon'   => 'required',
            'gambar' => 'nullable|image|max:5120|mimes:jpg,jpeg,png',
        ];
    }
}
