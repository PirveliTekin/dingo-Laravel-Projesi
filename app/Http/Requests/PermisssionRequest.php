<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermisssionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:90|min:2|string',
        ];
    }

    /**
     * @return array
     */
    public  function messages()
    {
        return [
            'name.required' => 'Name alanını boş geçmeyiniz',
            'name.max' => 'Name alanını maximum 90 karakter olmalıdır.',
            'name.min' => 'Name alanını minimum 2 karakter olmalıdır.',
            'name.string' => 'Name alanını metin olmalıdır.',
        ];
    }
}
