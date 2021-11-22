<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembreCreateRequest extends FormRequest
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
            'civilite'=>'required|max:4',
            'nom'=>'required|min:5',
            'prenom'=>'required|min:5',
            'fkpays'=>'required',
            'email'=>'required|email',


        ];
    }
    // public function messages()
    // {
    //     return [
    //         'nom' => 'The nom is required',
    //         'prenom' => 'The prenom is required',
    //         'email' => 'The email is required',
    //         'civilite' => 'The civilite is required',
    //         'fkpays'=>'The country is required',
    //     ];
    // }
}
