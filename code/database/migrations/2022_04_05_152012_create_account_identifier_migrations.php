<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    

    /**
     * 
     */
    return new class extends Migration
    {
        // Code Preperation
            // Base
        const DB_CONNECTOR = 'mysql';
        const DB_ENGINE_DEFAULT = 'InnoDB';

            // Table names
        const DB_TABLE_NAME_ACCOUNT_ID = 'account_identifier';
        const DB_TABLE_NAME_APPLICATION = 'label_application_software';



        /**
         * 
         */
        public function up()
        {
            /**
             * 
             */
            Schema::connection( self::DB_CONNECTOR )
                  ->create( self::DB_TABLE_NAME_APPLICATION, 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id();

                    $table->uuid( 'identifier' )
                          ->index()
                          ->comment('');

                    $table->string( 'title' )
                    ->comment('');

                    $table->longText( 'description' )
                          ->nullable()
                          ->comment('');
                }
            );
            

            /**
             * 
             */
            Schema::connection( self::DB_CONNECTOR )
                  ->create( self::DB_TABLE_NAME_ACCOUNT_ID, 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id(); 

                    $table->bigInteger( 'account_id' )
                          ->unsigned()
                          ->comment('');

                    $table->bigInteger( 'application_id' )
                          ->unsigned()
                          ->comment('');
                    
                    $table->uuid( 'identifier' )
                          ->index()
                          ->comment('');



                    $table->foreign( 'account_id' )
                          ->references( 'id' )
                          ->on( 'accounts' );

                    $table->foreign( 'application_id' )
                          ->references( 'id' )
                          ->on( self::DB_TABLE_NAME_APPLICATION );
                }
            );
        }


        /**
         * 
         */
        public function down()
        {
            //
            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_APPLICATION );
                  
            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_ACCOUNT_ID );
        }
    };

?>