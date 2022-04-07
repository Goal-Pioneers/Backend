<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Routes\RoutesAccountAPIModel;
use App\Models\Routes\RoutesNewsletterApiModel;
use App\Models\Routes\RoutesMailingListApiModel;

use App\Http\Controllers\TokenController;



/**
 * 
 */
Route::group( [ 'prefix' => '1.0.0' ], 
    function() 
    {
        RoutesAccountAPIModel::register();
    }
);


/**
 * 
 */
Route::middleware( 'auth:sanctum' )->group( 
    function()
    {
        Route::group( [ 'prefix' => '1.0.0' ], 
            function() 
            {
                RoutesNewsletterApiModel::register();
                RoutesMailingListApiModel::register();
            }
        );
    }
);