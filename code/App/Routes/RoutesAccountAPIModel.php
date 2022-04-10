<?php    

    namespace App\Routes;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\AccountController;



    class RoutesAccountAPIModel
    {
        /**
         * 
         */
        public static function register()
        {
            
            Route::group( [ 'prefix' => 'account' ], 
                function() 
                {
                    Route::get( 'me', [ AccountController::class, 'me' ] );
                    Route::post( 'registration', [ AccountController::class, 'register' ] );
                    Route::post( 'login', [ AccountController::class, 'login' ] );   
                    
                    Route::post( 'forgot_username', [ AccountController::class, 'forgotUsername' ] ); 

                    Route::post( 'forgot_username', [ AccountController::class, 'forgotUsername' ] );   
                    Route::post( 'forgot_password', [ AccountController::class, 'forgotPassword' ] );   

                    Route::post( 'login_with_mail', [ AccountController::class, 'loginWithMail' ] );   
                }
            );

        }
    }
?>