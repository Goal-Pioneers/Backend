<?php

// Needed Libraries
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


// Code Function
/**
 * 
 */
    return new class extends Migration
    {
        // Code Preperation
        const DB_TABLE_NAME = 'address_city';

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            //
            Schema::create( self::DB_TABLE_NAME, 
                function ( Blueprint $table ) 
                {
                    $table->id(); 

                    $table->bigInteger('address_label_country_id')->unsigned();
                    $table->bigInteger('address_province_id')->unsigned();

                    $table->bigInteger('city_name_id')->unsigned()->unique();

                    $table->foreign('address_label_country_id')->references('id')->on('address_label_country');
                    $table->foreign('address_province_id')->references('id')->on('address_city_province');
                    $table->foreign('city_name_id')->references('id')->on('address_label_city');
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
            Schema::dropIfExists( self::DB_TABLE_NAME );
        }
    };

?>