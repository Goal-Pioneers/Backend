<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubscriptionCategoryModel;
use App\Models\MailingListsModel;
use App\Models\SubscriptionModel;


/**
 * 
 */
class SubscriptionController 
    extends Controller
{
    /**
     * 
     */
    public function select( $request_id )
    {
        $subscription = SubscriptionModel::find( $request_id );

        if( is_null( $subscription ) )
        {
            return response()->json( 'Post does not exist.', 200 );
        }

        return response()->json( $subscription, 200 );
    }


    /**
     * 
     */
    public function page( Request $request )
    {
        self::logClientIP( $request );

    }


    /**
     * 
     */
    public function create( Request $request )
    {
        self::logClientIP( $request );

        // Get Mail
        $mail = MailingListsModel::find( 
            $request->input( 'mail_id' ) 
        );

        if( is_null( $mail ) )
        {
            return response()->json( 'Post does not exist.', 200 );
        }

        $category = SubscriptionCategoryModel::find(
            $request->input( 'category_id' )
        );

        if( is_null( $category ) )
        {
            return response()->json( 'Post does not exist.', 200 );
        }

        $input = $request->all();
        $subscription = SubscriptionModel::create( $input );

        return response()->json( $request, 200 );
    }


    /**
     * 
     */
    public function update( Request $request )
    {
        self::logClientIP( $request );

        // Get Mail
        $mail = MailingListsModel::find( 
            $request->input( 'mail_id' ) 
        );

        if( is_null( $mail ) )
        {
            return response()->json( 'Post does not exist.', 200 );
        }

        $category = SubscriptionCategoryModel::find(
            $request->input( 'category_id' )
        );

        if( is_null( $category ) )
        {
            return response()->json( 'Post does not exist.', 200 );
        }

        $subscription = SubscriptionModel::find( $request->input('id') );
        
        $subscription->mail_id      = $mail->id;
        $subscription->category_id  = $category->id;

        $subscription->save();

        return response()->json( $request, 200 );
    }


    /**
     * 
     */
    public function delete( Request $request )
    {
        self::logClientIP( $request );

        $subscription = SubscriptionModel::find( $request->input('id') );

        if( is_null( $subscription ) )
        {
            return response()->json( 'Post does not exist.', 200 );
        }
        
        $subscription->delete();

        return response()->json( $subscription, 200 );
    }


}
