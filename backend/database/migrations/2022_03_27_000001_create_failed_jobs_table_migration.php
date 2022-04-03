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
        const DB_TABLE_NAME = 'failed_jobs';

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
                    $table->string('uuid')->unique();
                    $table->text('connection');
                    $table->text('queue');
                    $table->longText('payload');
                    $table->longText('exception');
                    $table->timestamp('failed_at')->useCurrent();
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