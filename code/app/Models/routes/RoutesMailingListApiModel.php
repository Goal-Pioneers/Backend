<?php
    namespace App\Models\Routes;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    
    use App\Http\Controllers\MailingListController;

    
    class RoutesMailingListApiModel
    {
        public static function register()
        {
            Route::get( 'subscription/mail/{id}', 
                [ MailingListController::class, 'select' ]
            );

            Route::post( 'subscription/mail/create', 
                [ MailingListController::class, 'create' ]
            );

            Route::patch( 'subscription/mail/update', 
                [ MailingListController::class, 'update' ]
            );

            Route::delete( 'subscription/mail/delete', 
                [ MailingListController::class, 'delete' ]
            ); 
        }
    }
?>