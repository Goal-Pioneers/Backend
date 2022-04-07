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
            Route::post( '1.0.0/subscription/create', 
                [SubscriptionController::class, 'create']
            );

            Route::get( '1.0.0/subscription/{id}', 
                [SubscriptionController::class, 'select']
            );

            Route::get( '1.0.0/subscription/page/{pagination}', 
                [SubscriptionController::class, 'page']
            );

            Route::patch( '1.0.0/subscription/update', 
                [SubscriptionController::class, 'update']
            );

            Route::delete( '1.0.0/subscription/delete', 
                [SubscriptionController::class, 'delete']
            );
        }
        

        public static function registerNewsletterCategory()
        {
            
            Route::get( '1.0.0/subscription/category/{id}', 
                [SubscriptionCategoryController::class, 'select']
            );

            Route::post( '1.0.0/subscription/category/create', 
                [SubscriptionCategoryController::class, 'create']
            );

            Route::patch( '1.0.0/subscription/category/update', 
                [SubscriptionCategoryController::class, 'update']
            );

            Route::delete( '1.0.0/subscription/category/delete', 
                [SubscriptionCategoryController::class, 'delete']
            );

        }
    }
?>