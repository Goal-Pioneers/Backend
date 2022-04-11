<?php
    namespace App\Routes;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    
    use App\Http\Controllers\MailingListController;

    
    class RoutesMailingListApiModel
    {
        /**
         * 
         */
        public static function register()
        {
            Route::group( [ 'prefix' => 'mailing_list' ], 
                function()
                {
                    Route::get( '{id}', 
                        [ MailingListController::class, 'select' ]
                    );
        
                    Route::post( 'create', 
                        [ MailingListController::class, 'create' ]
                    );
        
                    Route::patch( 'update', 
                        [ MailingListController::class, 'update' ]
                    );
        
                    Route::delete( 'delete', 
                        [ MailingListController::class, 'delete' ]
                    ); 
                }
            );
        }
    }
?>