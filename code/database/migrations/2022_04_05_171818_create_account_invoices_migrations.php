<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    
    return new class extends Migration
    {
      // Code Preperation
          // Base
      const DB_CONNECTOR = 'mysql';
      const DB_ENGINE_DEFAULT = 'InnoDB';
      
          // Table Name
      const DB_TABLE_NAME_ACCOUNT_INVOICES_STATE = 'account_invoice_state';
      const DB_TABLE_NAME_ACCOUNT_INVOICES = 'account_invoices';
      const DB_TABLE_NAME_ACCOUNT_CURRENCY = 'currencies';

        
      public function up()
        {
            //
            Schema::connection( self::DB_CONNECTOR )
                ->create( self::DB_TABLE_NAME_ACCOUNT_INVOICES_STATE, 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id();

                    $table->string( 'content' )
                          ->unique()
                          ->comment('');
                }
            );


            Schema::connection( self::DB_CONNECTOR )
                ->create( self::DB_TABLE_NAME_ACCOUNT_CURRENCY, 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id();

                    $table->string( 'currency_name' )
                          ->unique()
                          ->comment('');
                    
                    $table->string( 'currency_acronyms' )
                          ->index()
                          ->comment('');

                    $table->string( 'currency_symbols' )
                          ->nullable()
                          ->comment('');
                }
            );


            Schema::connection( self::DB_CONNECTOR )
                    ->create( self::DB_TABLE_NAME_ACCOUNT_INVOICES, 
                    function ( Blueprint $table ) 
                    {
                        $table->engine = self::DB_ENGINE_DEFAULT;

                        $table->id();

                        $table->bigInteger( 'account_id' )
                              ->unsigned()
                              ->comment('');

                        $table->json( 'billing_content' )
                        ->comment('');
                        $table->double( 'total_cost' )
                        ->comment('');

                        $table->bigInteger( 'currency_id' )
                              ->unsigned()
                              ->comment('');

                        $table->bigInteger( 'account_invoice_id' )
                              ->unsigned()
                              ->comment('');

                        $table->timestamps();

                        $table->foreign( 'account_id' )
                              ->references( 'id' )
                              ->on( 'accounts' );
                        
                        $table->foreign( 'currency_id' )
                              ->references( 'id' )
                              ->on( self::DB_TABLE_NAME_ACCOUNT_CURRENCY );

                        $table->foreign( 'account_invoice_id' )
                              ->references( 'id' )
                              ->on( self::DB_TABLE_NAME_ACCOUNT_INVOICES_STATE );
                  }
            );
        }


        
        public function down()
        {
            //
            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_ACCOUNT_INVOICES_STATE );

            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_ACCOUNT_CURRENCY );

            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_ACCOUNT_INVOICES );
        }
      };
?>