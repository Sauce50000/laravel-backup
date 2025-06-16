<?php

namespace App\Http\Requests\Notice;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoticeRequest extends FormRequest
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
            'title_en' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:notices,slug',
            'published_date' => 'nullable|date',
            'publisher' => 'required|string|max:255',
            'notice_category_id' => 'required|exists:notice_categories,id',
            'file_path' => 'required|file|mimes:pdf|max:10240', // 10MB max
        ];
    }
}
