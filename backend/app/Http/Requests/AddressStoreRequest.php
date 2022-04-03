<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    
    /**
     * 
     */
    class AddressStoreRequest 
        extends FormRequest
    {
        /**
         * Checks if the current request is over https and if the request has a token. thereby safe to use. 
         * @return bool
         */
        final public function authorize(): bool
        {
            return  $this->secure() && 
                    !is_null( $this->bearerToken() );
        }

        
        final public function rules()
        {
            return 
            [
                //
            ];
        }
    }

?>