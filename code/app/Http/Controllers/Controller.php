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

    use App\Models\TypeIPAddressModel;
    use App\Models\LabelIPAddressModel;
    use App\Models\AccountActivityVisitsModel;
    use App\Models\LabelAccountActivityStatusModel;


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

        final protected function getIPModel( string $ip_addr ):? LabelIPAddressModel
        {
            $model = LabelIPAddressModel::where( 'content', $ip_addr )->first();

            if( isset( $model ) )
            {
                return $model;       
            }
            else 
            {
                $inp = array();
                $inp['content'] = $ip_addr;

                $model = LabelIPAddressModel::create( $inp );

            }
            return $model;
        }


        final protected function getStatusModel( string $status ):? LabelAccountActivityStatusModel
        {
            $model = LabelAccountActivityStatusModel::where( 'content', $status )->first();

            if( isset( $model ) )
            {
                return $model;
            }
            else 
            {
                $inp = array();
                $inp['content'] = $status;

                $model = LabelAccountActivityStatusModel::create( $inp );

            }
            return $model;
        }


        final protected function getIPAddressType( string $type_name ):? TypeIPAddressModel
        {
            $model = TypeIPAddressModel::where( 'content', $type_name)->first();

            if(isset($model))
            {
                return $model;
            }
            else 
            {
                $inp = array();
                $inp['content'] = $type_name;

                $model = TypeIPAddressModel::create( $inp );
            }
            return $model;
        }


        /**
         * 
         */
        final public function logClientIP( Request $request, int $account_id, string $status_str ): bool
        {
            $retVal = false;

            if( self::logIp )
            {

                // Retrieves request ip of the user
                $ipAddressModel = self::getIPModel( $request->ip() );
                $status = self::getStatusModel( $status_str );

                if( filter_var( $request->ip(), FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) )
                {
                    $addr_type = self::getIPAddressType( 'IPv4' );
                    
                    $inp = array();
                    $inp['account_id'] = $account_id;
                    $inp['label_account_activity_status_id'] = $status->id;
                    $inp['ip_address_id'] = $ipAddressModel->id;
                    $inp['ip_address_type_id'] = $addr_type->id;
                    $inp['request'] = '{}';

                    AccountActivityVisitsModel::create( $inp );

                    $retVal = true;
                }

                if( filter_var( $request->ip(), FILTER_VALIDATE_IP, FILTER_FLAG_IPV6 ) )
                {
                    $addr_type = self::getIPAddressType( 'IPv6' );

                    $inp = array();
                    $inp['account_id'] = $account_id;
                    $inp['label_account_activity_status_id'] = $status->id;
                    $inp['ip_address_id'] = $ipAddressModel->id;
                    $inp['ip_address_type_id'] = $addr_type->id;
                    $inp['request'] = '{}';

                    AccountActivityVisitsModel::create( $inp );

                    $retVal = true;
                }
            }

            return $retVal;
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