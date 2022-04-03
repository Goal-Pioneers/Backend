<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class AccountLoginRequest 
    extends FormRequest
{
    final public function authorize(): bool
    {
        return $this->secure();
    }

    
    final public function rules()
    {
        return 
        [
            'username' => 'required',
            'password' => 'required',
        ];
    }
}
