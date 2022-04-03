<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    use App\Http\Requests\OnlyJSONRequest;

    
    /**
     * 
     */
    class AddressStoreRequest 
        extends OnlyJSONRequest
    {
        /**
         * Checks if the current request is over https and if the request has a token. thereby safe to use. 
         * @return bool
         */
        final public function inputAuthorization(): bool
        {
            return  !is_null( $this->bearerToken() );
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