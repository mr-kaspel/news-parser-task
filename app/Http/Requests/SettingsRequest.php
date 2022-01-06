<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'address' => 'required|min:4|max:200',
            'count' => 'required|min:1|max:200',
        ];
    }

    public function messages() {
        return [
            'address.required' => 'Поле "Адрес сайта" является обязатеьным',
            'count.required' => 'Поле "Количество элементов" является обязатеьным',
        ];
    }
}
