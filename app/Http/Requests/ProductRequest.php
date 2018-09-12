<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
	'name' => [ // Правила валидации для поля name
	'max:255', // Длина не более 32 Б
	'min:1', // Длина не менее 1 Б
	'regex:/^[\da-z а-яё!,.-]+$/iu', // Регулярное выражение: а-я, цифры, пробел
	'required', // Обязательное поле
	//'unique:products', // Не допускать повторов в таблице rooms
	],

	'price' => [ // Правила валидации для поля name
	'numeric',
	'required', // Обязательное поле
	],

	'description' => [ // Правила валидации для поля name
	'max:1000', // Длина не более 32 Б
	'min:1', // Длина не менее 1 Б
	'regex:/^[\d а-яё!.),+:?\n-]+$/iu', // Регулярное выражение: а-я, цифры, пробел
	'required', // Обязательное поле
	],
	'count' => [ // Правила валидации для поля count
	'numeric',
	'required', // Обязательное поле
	],
];
}
}
