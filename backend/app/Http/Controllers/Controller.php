<?php

    // https://www.iana.org/assignments/media-types/media-types.xhtml
    // List of media types

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Routing\Controller as BaseController;


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
        final public function logClientIP( Request $request ): bool
        {
            $ipAddress = null;

            if( self::logIp )
            {
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
            if( $request->accepts( ['application/json' ] ) )
            {
                return True;
            }

            return False;
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