<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
        $rules = [];

        // get function method.
        $currentAction = $this->route()->getActionMethod();

        switch ($this->method()) :
            case 'POST':
                switch ($currentAction) :
                    case 'store':
                        $rules = [
                            'name' => 'required|unique:students',
                            'birthday' => 'required',
                            'class' => 'required'
                        ];
                        break;
                    endswitch;
            endswitch;

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Bắt buộc phải điền tên.',
            'birthday.required' => 'Bắt buộc phải điền ngày sinh.',
            'class.required' => 'Bắt buộc phải điền lớp.'
        ];
    }
}
