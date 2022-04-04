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
        // Preperation
        const DB_TABLE_NAME_PROVINCE        = 'label_address_province';
        const DB_TABLE_NAME_COUNTRY         = 'label_address_country';
        const DB_TABLE_NAME_CITY            = 'label_address_city';
        const DB_TABLE_NAME_ROADNAME        = 'label_address_roadname';
        const DB_TABLE_NAME_REGION          = 'label_address_region';
        const DB_TABLE_NAME_APARTMENT       = 'label_address_apartment';
        

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create( self::DB_TABLE_NAME_COUNTRY, 
                function ( Blueprint $table ) 
                {
                    $table->id(); 
                    $table->string('content')->unique();
                }
            );


            Schema::create( self::DB_TABLE_NAME_CITY, 
                function( Blueprint $table ) 
                {
                    $table->id();
                    $table->string('content')->unique();
                }
            );


            Schema::create( self::DB_TABLE_NAME_PROVINCE, 
                function ( Blueprint $table ) 
                {
                    $table->id(); 
                    $table->string('content')->unique();
                }
            );   


            Schema::create( self::DB_TABLE_NAME_ROADNAME, 
                function ( Blueprint $table ) 
                {
                    $table->id(); 
                    $table->string('content')->unique();
                }
            );


            Schema::create( self::DB_TABLE_NAME_REGION, 
                function ( Blueprint $table ) 
                {
                    $table->id(); 
                    $table->string('content')->unique();
                }
            );


            Schema::create( self::DB_TABLE_NAME_APARTMENT, 
                function ( Blueprint $table ) 
                {
                    $table->id(); 
                    $table->string('content')->unique();
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
            Schema::dropIfExists( self::DB_TABLE_NAME_COUNTRY );
            Schema::dropIfExists( self::DB_TABLE_NAME_CITY );
            Schema::dropIfExists( self::DB_TABLE_NAME_PROVINCE );
            Schema::dropIfExists( self::DB_TABLE_NAME_ROADNAME );
            Schema::dropIfExists( self::DB_TABLE_NAME_REGION );
            Schema::dropIfExists( self::DB_TABLE_NAME_APARTMENT );
        }
    };
?>