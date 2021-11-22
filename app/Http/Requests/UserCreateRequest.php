<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            //
            'nom'=>'required|min:5',
            'prenom'=>'required|min:5',
            'email'=>'required|email',
            'password'=>'required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'nom' => 'The nom is required',
            'prenom' => 'The prenom is required',
            'email' => 'The email is required',
            'password' => 'The password is required',
        ];
    }
}
