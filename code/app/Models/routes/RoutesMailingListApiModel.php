<?php
    namespace App\Models\Routes;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    
    use App\Http\Controllers\MailingListController;

    
    class RoutesMailingListApiModel
    {
        public static function register()
        {
            Route::get( '1.0.0/subscription/mail/{id}', 
                [MailingListController::class, 'select']
            );

            Route::post( '1.0.0/subscription/mail/create', 
                [MailingListController::class, 'create']
            );

            Route::patch( '1.0.0/subscription/mail/update', 
                [MailingListController::class, 'update']
            );

            Route::delete( '1.0.0/subscription/mail/delete', 
                [MailingListController::class, 'delete']
            ); 
        }
    }
?>