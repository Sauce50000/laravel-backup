<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'email' => 'nullable|email|unique:employees,email,' . $this->employee->id,
            'phone' => 'nullable|string|max:20',
            'post_id' => 'required|exists:posts,id',
            'department_id' => 'nullable|exists:departments,id',
            'image_path' => 'nullable|image|max:10240',
            'is_active' => 'nullable|in:on,off,true,false,1,0',
        ];
    }
}
