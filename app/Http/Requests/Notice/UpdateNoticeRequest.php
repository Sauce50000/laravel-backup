<?php

namespace App\Http\Requests\Notice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNoticeRequest extends FormRequest
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
            'title' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('notices', 'slug')->ignore($this->notice->id),
            ],
            'published_date' => 'nullable|date',
            'publisher' => 'nullable|string|max:255',
            'notice_category_id' => 'nullable|exists:notice_categories,id',
            'file_path' => 'nullable|file|mimes:pdf|max:10240', // Optional on update
        ];
    }
}
