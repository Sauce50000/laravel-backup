<?php

namespace App\Http\Requests\RecordCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecordCategoryRequest extends FormRequest
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
            'slug' => 'required|string|max:255|unique:record_categories,slug',
            'record_type_id' => 'required|exists:record_types,id',
        ];
    }
}
