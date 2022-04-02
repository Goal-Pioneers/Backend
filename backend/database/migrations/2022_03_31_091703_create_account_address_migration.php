<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Code Preperation
define('DB_TABLE_NAME', 'account_address');


// Code Function
/**
 * 
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create( DB_TABLE_NAME, 
            function ( Blueprint $table ) 
            {
                $table->id(); 

                $table->bigInteger('address_city_id')->unsigned();

                $table->string('address_number');

                $table->foreign('address_city_id')->references('id')->on('address_city');

            }
        );
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists( DB_TABLE_NAME );
    }
};

?>