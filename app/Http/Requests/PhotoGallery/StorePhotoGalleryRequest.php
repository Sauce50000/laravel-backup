<?php

namespace App\Http\Requests\PhotoGallery;

use Illuminate\Foundation\Http\FormRequest;

class StorePhotoGalleryRequest extends FormRequest
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
            'album_title' => 'required|string|max:255',
            'album_title_en' => 'required|string|max:255',
        ];
    }
}
