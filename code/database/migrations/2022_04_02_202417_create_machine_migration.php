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
        const DB_TABLE_NAME_PARAMETER_RULES     = 'robot_rule_parameters';
        const DB_TABLE_NAME_ROBOT_PARAMETERS    = 'robot_parameters';
        const DB_TABLE_NAME_SITEMAP             = 'sitemap';


        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create( self::DB_TABLE_NAME_PARAMETER_RULES, 
                function ( Blueprint $table ) 
                {
                    $table->id();
                    $table->timestamps();
                }
            );


            Schema::create( self::DB_TABLE_NAME_ROBOT_PARAMETERS, 
                function ( Blueprint $table ) 
                {
                    $table->id();
                    $table->timestamps();
                }
            );


            Schema::create( self::DB_TABLE_NAME_SITEMAP, 
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
            Schema::dropIfExists( self::DB_TABLE_NAME_PARAMETER_RULES );
            Schema::dropIfExists( self::DB_TABLE_NAME_ROBOT_PARAMETERS );
            Schema::dropIfExists( self::DB_TABLE_NAME_SITEMAP );
        }
    };
?>