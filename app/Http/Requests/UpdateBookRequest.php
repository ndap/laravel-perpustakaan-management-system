<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'publication_year' => 'required|integer|min:1900|max:' . date('Y'),
            'synopsis' => 'nullable|string|max:2000',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:book_categories,id',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Judul buku wajib diisi.',
            'title.max' => 'Judul buku maksimal 255 karakter.',
            'author.required' => 'Penulis wajib diisi.',
            'author.max' => 'Nama penulis maksimal 255 karakter.',
            'publisher.required' => 'Penerbit wajib diisi.',
            'publisher.max' => 'Nama penerbit maksimal 255 karakter.',
            'publication_year.required' => 'Tahun terbit wajib diisi.',
            'publication_year.integer' => 'Tahun terbit harus berupa angka.',
            'publication_year.min' => 'Tahun terbit minimal 1900.',
            'publication_year.max' => 'Tahun terbit tidak boleh melebihi tahun ini.',
            'synopsis.max' => 'Sinopsis maksimal 2000 karakter.',
            'cover.image' => 'Cover harus berupa gambar.',
            'cover.mimes' => 'Format cover harus jpeg, png, jpg, gif, atau webp.',
            'cover.max' => 'Ukuran cover maksimal 2MB.',
            'categories.required' => 'Pilih minimal satu kategori.',
            'categories.min' => 'Pilih minimal satu kategori.',
            'categories.*.exists' => 'Kategori yang dipilih tidak valid.',
        ];
    }
}
