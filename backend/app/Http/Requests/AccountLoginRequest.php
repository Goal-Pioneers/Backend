<?php


    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    use App\Http\Requests\OnlySecureRequest;


    /**
     * 
     */
    class AccountLoginRequest 
        extends OnlySecureRequest
    {   
        final public function rules()
        {
            return 
            [
                'username' => 'required',
                'password' => 'required',
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