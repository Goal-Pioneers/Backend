<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    
    use App\Http\Requests\OnlyJSONRequest;
    

    class SubscriptionRequest 
        extends OnlyJSONRequest
    {

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