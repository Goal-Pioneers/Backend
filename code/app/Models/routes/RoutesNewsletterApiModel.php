<?php
    namespace App\Models\Routes;

    use App\Http\Controllers\SubscriptionController;
    use App\Http\Controllers\SubscriptionCategoryController;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;


    class RoutesNewsletterApiModel
    {
        public static function registerSubscription()
        {
            Route::post( 'subscription/create', 
                [ SubscriptionController::class, 'create' ]
            );

            Route::get( 'subscription/{id}', 
                [ SubscriptionController::class, 'select' ]
            );

            Route::get( 'subscription/page/{pagination}', 
                [ SubscriptionController::class, 'page' ]
            );

            Route::patch( 'subscription/update', 
                [ SubscriptionController::class, 'update' ]
            );

            Route::delete( 'subscription/delete', 
                [ SubscriptionController::class, 'delete' ]
            );
        }
        

        public static function registerNewsletterCategory()
        {
            
            Route::get( 'subscription/category/{id}', 
                [ SubscriptionCategoryController::class, 'select' ]
            );

            Route::post( 'subscription/category/create', 
                [ SubscriptionCategoryController::class, 'create' ]
            );

            Route::patch( 'subscription/category/update', 
                [ SubscriptionCategoryController::class, 'update' ]
            );

            Route::delete( 'subscription/category/delete', 
                [ SubscriptionCategoryController::class, 'delete' ]
            );

        }
    }
?>