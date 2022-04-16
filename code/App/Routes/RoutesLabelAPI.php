<?php    

    namespace App\Routes;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\LabelController;



    class RoutesLabelAPI
    {
        /**
         * 
         */
        public static function register()
        {
            
            Route::group( [ 'prefix' => 'account' ], 
                function() 
                {
                      
                    Route::post( 'create', 
                        [ SubscriptionController::class, 'create' ]
                    );
        
                    Route::get( '{id}', 
                        [ SubscriptionController::class, 'select' ]
                    );
        
                    Route::get( 'page/{pagination}', 
                        [ SubscriptionController::class, 'page' ]
                    );
        
                    Route::patch( 'update', 
                        [ SubscriptionController::class, 'update' ]
                    );
        
                    Route::delete( 'delete', 
                        [ SubscriptionController::class, 'delete' ]
                    );
                }
            );

        }
    }
?>