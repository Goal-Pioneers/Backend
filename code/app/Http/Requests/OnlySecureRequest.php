<?php


    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    
    class OnlySecureRequest 
        extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        final public function authorize(): bool
        {
            if( DEBUGGING )
            {
                return true;
            }

            return  $this->secure();
        }
    }

?>