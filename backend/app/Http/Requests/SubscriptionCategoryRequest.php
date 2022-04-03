<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    
    class SubscriptionCategoryRequest 
        extends FormRequest
    {
        
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