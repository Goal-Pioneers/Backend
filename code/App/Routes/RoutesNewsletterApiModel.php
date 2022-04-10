<?php
    namespace App\Routes;

    use App\Http\Controllers\SubscriptionController;
    use App\Http\Controllers\SubscriptionCategoryController;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;


    class RoutesNewsletterApiModel
    {
        /**
         * 
         */
        public static function register()
        {
            Route::group( [ 'prefix' => 'newsletter' ], 
                function() 
                {
                    self::registerNewsletterCategory();

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
        

        /**
         * 
         */
        public static function registerNewsletterCategory()
        {
            Route::group( [ 'prefix' => 'category' ], 
                function() 
                {
                    Route::get( '{id}', 
                        [ SubscriptionCategoryController::class, 'select' ]
                    );
        
                    Route::post( 'create', 
                        [ SubscriptionCategoryController::class, 'create' ]
                    );
        
                    Route::patch( 'update', 
                        [ SubscriptionCategoryController::class, 'update' ]
                    );
        
                    Route::delete( 'delete', 
                        [ SubscriptionCategoryController::class, 'delete' ]
                    );
                }
            );
        }
    }
?>