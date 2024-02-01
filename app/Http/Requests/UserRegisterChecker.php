<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validators;


class UserRegisterChecker extends FormRequest
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
            "name"=> "required |max:20",
            "email"=> "required",
            "password"=> "required",
            "confirm_password"=> "required|same:password"
        ];
    }
    public function messages(){
        return [
            "name.required" => "Név elvárt",
            "email.required" => "Email elvárt",
            "password.required" => "Jelszó elvárt",
            "confirm_password.same" => "A jelszó nem egyezik",
        ];
    }
}

