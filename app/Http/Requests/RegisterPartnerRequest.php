<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterPartnerRequest extends FormRequest
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
            'name' => 'required|min:3|regex:/^[a-zA-Z\s]*$/',
            'date_of_birth' => 'required|date_format:d/m/Y',
            'email' => 'required|email|unique:partners,email|unique:users,email',
            'website' => 'required',
            'password' => 'required|min:8',
            'password_conformation' => 'required',
        ];
    }
}
