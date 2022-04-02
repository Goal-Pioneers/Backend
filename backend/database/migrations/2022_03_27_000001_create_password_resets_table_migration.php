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
        const DB_TABLE_NAME = 'password_resets';

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create( self::DB_TABLE_NAME, 
                function ( Blueprint $table ) 
                {
                    $table->id();

                    $table->bigInteger('email_id')->unsigned()->index();

                    $table->string('token');
                    
                    $table->timestamp('created_at')->nullable()->useCurrent();
                    $table->foreign('email_id')->references('id')->on('mailing_lists');
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
            Schema::dropIfExists( self::DB_TABLE_NAME );
        }
    };

?>