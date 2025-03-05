<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rules;


class UserRegisterRequest extends FormRequest
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

            // name, email, password
            "name" => "required|max:10|unique:users,name",
            "email" => "required|email|unique:users,email",
            "city" => "required",
            "password" => [
                            "required",
                            "min:8",
                            "regex:/[a-z]/",
                            "regex:/[A-Z]/",
                            "regex:/[0-9]/" ],
            "confirm_password" => "required|same:password"
        ];
    }

    public function messages() {

        return [
            "name.required" => "Név nem lehet üres",
            "name.max" => "Túl hosszú név",
            "name.unique" => "Létező név",
            "email.required" => "Email nem lehet üres",
            "email.unique" => "Létező email",
            "city.required" => "Város név nem lehet üres",
            "password.required" => "Jelszó nem lehet üres",
            "password.min" => "Túl rövid jelszó",
            "password.regex" => "A jelszzónak tartalmazia kell kisbetűt, nagybetűt és számot",
            "confirm_password.same" => "Nem egyező jelszó"
        ];
    }

    public function failedValidation( Validator $validator ) {

        throw new HttpResponseException( response()->json([

            "success" => false,
            "message" => "Beviteli hiba",
            "data" => $validator->errors()
        ]));
    }
}