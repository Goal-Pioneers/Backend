<?php    

    namespace App\Models\routes;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\AccountController;



    class RoutesAccountAPIModel
    {
        public static function register()
        {
            Route::post( '1.0.0/account/registration', 
                         [AccountController::class, 'register'] );

            
            Route::post( '1.0.0/account/login', 
                         [AccountController::class, 'login'] );
        }
    }
?>