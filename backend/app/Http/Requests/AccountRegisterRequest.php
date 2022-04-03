<?php


    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    
    use App\Http\Requests\OnlySecureRequest;

    /**
     * 
     */
    class AccountRegisterRequest 
        extends OnlySecureRequest
    {
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
                'username.required'=> 'username is required!',
                'password.required' => 'Password is required!',
                'confirm_password.required' => 'confirm password is required!'
            ];
        }

        
        final public function filters()
        {
            return 
            [
                'email' => 'trim|lowercase',
                'username' => 'trim|lowercase'
            ];
        }
    }
?>