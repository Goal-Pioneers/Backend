<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Routes\RoutesAccountAPIModel;
use App\Models\Routes\RoutesNewsletterApiModel;
use App\Models\Routes\RoutesMailingListApiModel;

use App\Http\Controllers\TokenController;



Route::group( [ 'prefix' => '1.0.0' ], 
    function() 
    {
        Route::group( [ 'prefix' => 'token' ], 
            function() 
            {
                Route::get( 'create', [ TokenController::class, 'create' ] );
                Route::get( 'reset', [ TokenController::class, 'reset' ] );
                Route::get( 'status', [ TokenController::class, 'status' ] ); 
            }
        );
    }
);


Route::middleware( 'auth:sanctum' )->group( 
    function()
    {
        Route::group( ['prefix'=>'1.0.0'], 
            function() 
            {
                RoutesAccountAPIModel::register();
                RoutesNewsletterApiModel::register();
                RoutesMailingListApiModel::register();
            }
        );
    }
);