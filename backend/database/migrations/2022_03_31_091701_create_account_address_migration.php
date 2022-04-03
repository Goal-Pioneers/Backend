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
        const DB_TABLE_NAME_ADDRESS = 'account_address';


        /**cd /
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            //
            Schema::create( self::DB_TABLE_NAME_ADDRESS, 
                function ( Blueprint $table ) 
                {
                    $table->id(); 

                    $table->bigInteger('address_city_id')->unsigned();

                    $table->string('address_number');

                    $table->foreign('address_city_id')->references('id')->on( 'entities_address_city' );

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
            Schema::dropIfExists( self::DB_TABLE_NAME_ADDRESS );
        }
    };
?>