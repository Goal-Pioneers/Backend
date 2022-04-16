<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Routes\RoutesAccountAPIModel;
use App\Routes\RoutesNewsletterApiModel;
use App\Routes\RoutesMailingListApiModel;
use App\Routes\RoutesLabelAPI;


define( 'VERSION_1_0_0_SLUG', '1.0.0' );
define( 'VERSION_1_0_0_FULL', '1.0.0 Alpha - Development' );

define( 'PROTECTED_AUTH', 'auth:sanctum' );


Route::group( [ 'prefix' => VERSION_1_0_0_SLUG ], 
    function() 
    {
        RoutesAccountAPIModel::register();
    }
);


Route::middleware( PROTECTED_AUTH )
    ->group( 
        function()
        {
            Route::group( [ 'prefix' => VERSION_1_0_0_SLUG ], 
                function() 
                {
                    RoutesNewsletterApiModel::register();
                    RoutesMailingListApiModel::register();
                    RoutesLabelAPI::register();
                }
            );
        }
    );