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
        const DB_TABLE_NAME_1 = 'alternate_subdomain';
        const DB_TABLE_NAME_2 = 'alternate_uri';

        const DB_TABLE_NAME_3 = 'extern_link';
        const DB_TABLE_NAME_4 = 'intern_link';


        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create( self::DB_TABLE_NAME_1, 
                function ( Blueprint $table ) 
                {
                    $table->id();
                    $table->timestamps();
                }
            );
            
            Schema::create( self::DB_TABLE_NAME_2, 
                function ( Blueprint $table ) 
                {
                    $table->id();
                    $table->timestamps();
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
            Schema::dropIfExists( self::DB_TABLE_NAME_1 );
            Schema::dropIfExists( self::DB_TABLE_NAME_2 );
        }
    };
?>