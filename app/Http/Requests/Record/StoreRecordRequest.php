<?php

namespace App\Http\Requests\Record;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecordRequest extends FormRequest
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
            'publisher' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:records,slug',
            'record_type_id' => 'required|exists:record_types,id',
            'record_category_id' => 'required|exists:record_categories,id',
            'file_path' => 'required|file|mimes:pdf|max:10240',
        ];
    }
}
