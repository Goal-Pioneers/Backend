<?php

    namespace App\Http\Requests;


    use Illuminate\Foundation\Http\FormRequest;


    /**
     * 
     */
    class AccountRegisterRequest 
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
                //
                'username'          => 'required',
                'mail'              => 'required|email',
                'password'          => 'required',
                'confirm_password'  => 'required|same:password'
            ];
        }


        final public function messages()
        {
            return 
            [
                'email.required' => 'Email is required!',
                'password.required' => 'Password is required!'
            ];
        }

        
        final public function filters()
        {
            return 
            [
                'email' => 'trim|lowercase'
            ];
        }
    }
?>