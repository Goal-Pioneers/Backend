<?php

    // https://www.iana.org/assignments/media-types/media-types.xhtml
    // List of media types

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Foundation\Validation\ValidatesRequests;

    use Illuminate\Routing\Controller as BaseController;

    use App\Http\AuthorizedUserController;


    /**
     * 
     */
    class Controller 
        extends BaseController
    {
        //
        use AuthorizesRequests, 
            DispatchesJobs, 
            ValidatesRequests;


        //
        const logIp = True;


        /**
         * 
         */
        final public function logClientIP( $request, $account_id, $status ): bool
        {
            $ipAddress = null;

            if( self::logIp )
            {
                // Retrieves request ip of the user
                $ipAddress = $request->ip();

                // Send IP to database

                return True;
            }

            return False;
        }


        /**
         * 
         */
        final public function onlyJsonAllowed( Request $request ): bool
        {
            return $request->isJson();
        }


        /**
         * 
         */
        final public function onlyXmlAllowed( Request $request ): bool 
        {
            if( $request->accepts( ['text/xml', 'application/xml'] ) )
            {
                return True;
            }

            return False;
        }

    }

?>