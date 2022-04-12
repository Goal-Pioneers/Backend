<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    
    use App\Http\Requests\AccountRegisterRequest;
    use App\Http\Requests\AccountLoginRequest;

    use App\Models\AccountModel;
    use App\Models\LabelMailingListsModel;
    use App\Models\PasswordResetsModel;
    use App\Models\ForgotUsernameModel;

    use App\Http\Controllers\MailingListController;


    use Illuminate\Support\Str;


    /**
     * 
     */
    class AccountController 
        extends Controller
    {
        /**
         * 
         */
        final public function register( AccountRegisterRequest $request )
        {
            $mlc = new MailingListController();
            $model_email = $mlc->select_by_name( $request->input( 'mail' ) );

            $email_does_not_exists = is_null( $model_email );

            if( $email_does_not_exists )
            {
                $emailInput[ 'content' ] = $request->input( 'mail' );
                $mailModel = LabelMailingListsModel::create( $emailInput );
            }
            else 
            {
                $mailModel = $model_email;
            }

            $inputModel[ 'username' ] = $request->input( 'username' );
            $inputModel[ 'email_id' ] = $mailModel->id;
            $inputModel[ 'password' ] = Hash::make( $request->input('password') );

            $account = AccountModel::create( $inputModel );

            $token = $account->createToken('account')->plainTextToken;
            $account->remember_token = $token;
            $account->save();

            // self::logClientIP( $request );

            $outputMessage['token']     = $token;
            $outputMessage['username']  = $account->username;
            $outputMessage['id']        = $account->id;

            return response()->json( $outputMessage, 200 );
        }


        /**
         * 
         */
        final public function me( Request $request )
        {   
            $account = AccountModel::where( 'remember_token', $request->bearerToken() )->firstOrFail();

            $json_response = array();

            $json_response['id'] = $account->id;
            $json_response['username'] = $account->username;

            $json_response['created_at'] = $account->created_at;
            $json_response['updated_at'] = $account->updated_at;

            return response()->json( $json_response, 200 );
        }
        

        /**
         * 
         */
        final public function login( AccountLoginRequest $request )
        {
            $outputMessage = null;

            if( Auth::attempt( [ 'username' => $request->username, 'password' => $request->password ] ) )
            { 
                $authUser = Auth::user();
                
                $authUser->remember_token = $authUser->createToken( 'account' )->plainTextToken;
                $authUser->save();

                $outputMessage['id']        =  $authUser->id;
                $outputMessage['username']  =  $authUser->username;
                $outputMessage['token']     =  $authUser->remember_token; 

                self::logClientIP( $request, $authUser->id, 'successfull' );
            } 
            else
            { 
                return response()->json( 'Unauthorised.', [ 'error'=>'Unauthorised' ] );
            } 
            
            return response()->json($outputMessage, 200);
        }


        final public function loginWithMail( Request $request )
        {
            
            return response()->json('ready', 200);
        }


        /**
         * 
         */
        final public function forgotPassword( Request $request )
        {
            $request->validate(
                [
                    'mail' => ['required', 'email']
                ]
            );

            $mail_model = LabelMailingListsModel::where( 'content', $request->input( 'mail' ) )->first();

            if( isset( $mail_model ) )
            {
                $token = Str::random( 254 );
                $uuid = Str::random( 64 );

                $inp = array();
                $inp[ 'email_id' ] = $mail_model->id;
                $inp[ 'token' ] = $token;
                $inp[ 'uuid' ] = $uuid;
                
                PasswordResetsModel::create( $inp );
            
                return response()->json( 'successfull', 200 );
            }
            else 
            {
                return response()->json('mail not found', 400);
            }
        }


        /**
         * 
         */
        final public function forgotUsername( Request $request )
        {
            $request->validate(
                [
                    'mail' => ['required', 'email']
                ]
            );

            $mail_model = LabelMailingListsModel::where( 'content', $request->input( 'mail' ) )->first();

            
            if( isset( $mail_model ) )
            {
                $token = Str::random( 254 );
                $uuid = Str::random( 64 );

                $inp = array();
                $inp[ 'email_id' ] = $mail_model->id;
                $inp[ 'token' ] = $token;
                $inp[ 'uuid' ] = $uuid;

                ForgotUsernameModel::create( $inp );

                return response()->json('ready', 200);
            }
            else 
            {
                // Error
                return response()->json('mail not found', 200);
            }
        }

    }
?>