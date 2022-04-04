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
        const DB_TABLE_NAME_ADDRESS_FIELD     = 'entities_address_field';
        const DB_TABLE_NAME_POST_FIELD        = 'entities_post_field';


        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            //
            Schema::create( self::DB_TABLE_NAME_POST_FIELD, 
                function ( Blueprint $table ) 
                {
                    $table->id();

                    $table->integer('zip_code')->unsigned()->index();
                    $table->bigInteger( 'region_id' )->unsigned();

                    $table->foreign('region_id')->references('id')->on('label_address_region');
                }
            );


            //
            Schema::create( self::DB_TABLE_NAME_ADDRESS_FIELD, 
                function ( Blueprint $table ) 
                {
                    $table->id(); 

                    $table->bigInteger( 'roadname_id' )->unsigned();
                    $table->integer( 'road_number' )->unsigned();
                    $table->integer( 'level' )->unsigned();
                    $table->bigInteger( 'apartment_id' )->unsigned();
                    
                    $table->foreign('roadname_id')->references('id')->on('label_address_roadname');
                    $table->foreign('apartment_id')->references('id')->on('label_address_apartment');
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
            Schema::dropIfExists( self::DB_TABLE_NAME_ADDRESS_FIELD );
            Schema::dropIfExists( self::DB_TABLE_NAME_POST_FIELD );
        }
    };
?>