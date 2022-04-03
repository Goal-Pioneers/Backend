<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;

    use Validator;

    use App\Models\User;
    
    use App\Http\Requests\AccountRegisterRequest;
    use App\Http\Requests\AccountLoginRequest;


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
            self::logClientIP( $request );
            
            $inputModel = $request->all();
            $inputModel['email'] = $request->input('mail');
            $inputModel['password'] = Hash::make( $inputModel['password'] );

            $account = User::create( $inputModel );

            $outputMessage['token']     = $account->createToken('account')->plainTextToken;
            $outputMessage['username']  = $account->username;
            $outputMessage['id']        = $account->id;

            return response()->json($outputMessage, 200);
        }
        

        /**
         * 
         */
        final public function login( AccountLoginRequest $request )
        {
            self::logClientIP( $request );

            $outputMessage = null;

            if( Auth::attempt( ['username' => $request->username, 'password' => $request->password] ) )
            { 
                $authUser = Auth::user(); 

                $outputMessage['token']     =  $authUser->createToken( 'account' )->plainTextToken; 
                $outputMessage['username']  =  $authUser->username;
                $outputMessage['id']        = $authUser->id;
            } 
            else
            { 
                return response()->json('Unauthorised.', ['error'=>'Unauthorised']);
            } 
            
            return response()->json($outputMessage, 200);
        }
    }
?>