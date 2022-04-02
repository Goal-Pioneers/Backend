<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Code Preperation
define('DB_TABLE_NAME', 'address_label_country');


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
                $table->string('country_name')->unique();
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