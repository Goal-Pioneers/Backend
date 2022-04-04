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
        const DB_TABLE_NAME_MAILING_LIST        = 'mailing_lists';
        const DB_TABLE_NAME_ROBOT_RULE_LABEL    = 'label_robot_rule';
        const DB_TABLE_NAME_URL_LIST            = 'label_url_list';


        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            //
            Schema::create( self::DB_TABLE_NAME_MAILING_LIST, 
                function ( Blueprint $table ) 
                {
                    $table->id();
                    $table->string('content')->unique();
                }
            );


            Schema::create( self::DB_TABLE_NAME_ROBOT_RULE_LABEL, 
                function ( Blueprint $table ) 
                {
                    $table->id();
                    $table->string('content')->unique();
                }
            );
            

            Schema::create( self::DB_TABLE_NAME_URL_LIST, 
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
            //
            Schema::dropIfExists( self::DB_TABLE_NAME_MAILING_LIST );
            Schema::dropIfExists( self::DB_TABLE_NAME_ROBOT_RULE_LABEL );
            Schema::dropIfExists( self::DB_TABLE_NAME_URL_LIST );
        }
    };
?>