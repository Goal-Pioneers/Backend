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
        const DB_TABLE_NAME_PROVINCE    = 'address_label_province';
        const DB_TABLE_NAME_COUNTRY     = 'address_label_country';
        const DB_TABLE_NAME_CITY        = 'address_label_city';
        
        
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
                    $table->string('country_name')->unique();
                }
            );


            Schema::create( self::DB_TABLE_NAME_CITY, 
                function( Blueprint $table ) 
                {
                    $table->id();
                    $table->string('city_name')->unique();
                }
            );


            Schema::create( self::DB_TABLE_NAME_PROVINCE, 
                function ( Blueprint $table ) 
                {
                    $table->id(); 
                    $table->string('province_name')->unique();
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
        }
    };
?>