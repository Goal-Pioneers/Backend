<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    const DB_TABLE_NAME_1 = 'robot_rule_parameters';
    const DB_TABLE_NAME_2 = 'robot_parameters';
    const DB_TABLE_NAME_3 = 'sitemap';

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

        Schema::create( self::DB_TABLE_NAME_3, 
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
        Schema::dropIfExists( self::DB_TABLE_NAME_3 );
    }
};
