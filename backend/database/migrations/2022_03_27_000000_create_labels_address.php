<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    const DB_TABLE_NAME_2 = 'address_label_province';
    const DB_TABLE_NAME_3 = 'address_label_country';
    const DB_TABLE_NAME_4 = 'address_label_city';
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( self::DB_TABLE_NAME_2, 
            function ( Blueprint $table ) 
            {
                $table->id(); 
                $table->string('province_name')->unique();
            }
        );

        Schema::create( self::DB_TABLE_NAME_3, 
            function ( Blueprint $table ) 
            {
                $table->id(); 
                $table->string('country_name')->unique();
            }
        );

        Schema::create( self::DB_TABLE_NAME_4, 
            function( Blueprint $table ) 
            {
                $table->id();
                $table->string('country_name')->unique();
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
        Schema::dropIfExists( self::DB_TABLE_NAME_2 );
        Schema::dropIfExists( self::DB_TABLE_NAME_3 );
        Schema::dropIfExists( self::DB_TABLE_NAME_4 );
    }
};
