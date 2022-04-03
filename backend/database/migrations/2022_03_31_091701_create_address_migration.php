<?php

// Needed Libraries
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


    // Code function
    /**
     * 
     */
    return new class extends Migration
    {
        // Code Preperation
        const DB_TABLE_NAME_ADDRESS_CITY = 'address_city';
        const DB_TABLE_NAME_ADDRESS_PROVINCE = 'address_city_province';
        const DB_TABLE_NAME_ADDRESS = 'account_address';


        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            //
            Schema::create( self::DB_TABLE_NAME_ADDRESS_PROVINCE, 
                function ( Blueprint $table ) 
                {
                    $table->id(); 

                    $table->bigInteger('address_label_province_id')->unsigned();
                    $table->integer('postal_code')->unsigned();
                    
                    $table->foreign( 'address_label_province_id' )->references( 'id' )->on( 'address_label_province' );
                }
            );


            //
            Schema::create( self::DB_TABLE_NAME_ADDRESS_CITY, 
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


            //
            Schema::create( self::DB_TABLE_NAME_ADDRESS, 
                function ( Blueprint $table ) 
                {
                    $table->id(); 

                    $table->bigInteger('address_city_id')->unsigned();

                    $table->string('address_number');

                    $table->foreign('address_city_id')->references('id')->on( 'address_city' );

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
            Schema::dropIfExists( self::DB_TABLE_NAME_ADDRESS_CITY );
            Schema::dropIfExists( self::DB_TABLE_NAME_ADDRESS_PROVINCE );
            Schema::dropIfExists( self::DB_TABLE_NAME_ADDRESS );
        }
    };

?>