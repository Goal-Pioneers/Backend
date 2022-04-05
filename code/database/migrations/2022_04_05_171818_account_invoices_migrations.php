<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    const DB_TABLE_NAME_ACCOUNT_INVOICES = 'account_invoices';
    const DB_TABLE_NAME_ACCOUNT_CURRENCY = 'currencies';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::connection('mysql')
            ->create( self::DB_TABLE_NAME_ACCOUNT_CURRENCY, 
            function ( Blueprint $table ) 
            {
                $table->engine = 'InnoDB';

                $table->id();

                $table->string('currency_name')->unique();
                $table->string('currency_acronyms')->index();
                $table->string('currency_symbols')->nullable();
            }
        );


        Schema::connection('mysql')
                ->create( self::DB_TABLE_NAME_ACCOUNT_INVOICES, 
                function ( Blueprint $table ) 
                {
                    $table->engine = 'InnoDB';

                    $table->id();

                    $table->bigInteger( 'user_id' )->unsigned();

                    $table->json( 'billing_content' );
                    $table->double('total_cost');

                    $table->bigInteger('currency_id')->unsigned();

                    $table->timestamps();

                    $table->foreign('user_id')->references('id')->on('users');
                    
                    $table->foreign('currency_id')->references('id')->on( self::DB_TABLE_NAME_ACCOUNT_CURRENCY );
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
    }
};
