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
        final public function inputAuthorization(): bool
        {
            return  !is_null( $this->bearerToken() );
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

?>