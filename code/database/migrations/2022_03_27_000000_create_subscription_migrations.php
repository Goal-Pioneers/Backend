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
            // Base
        const DB_CONNECTOR = 'mysql';
        const DB_ENGINE_DEFAULT = 'InnoDB';

            // Table Names
        const DB_TABLE_NAME_LABEL_SUBSCRIPTION_CATEGORY = 'newsletter_subscription_categories';
        const DB_TABLE_NAME_SUBSCRIPTION                = 'newsletter_subscriptions';
        
        
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            //
            Schema::connection( self::DB_CONNECTOR )
                  ->create( self::DB_TABLE_NAME_LABEL_SUBSCRIPTION_CATEGORY, 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;
                    $table->id();

                    $table->string( 'title' )
                          ->unique();
                    
                    $table->mediumText( 'description' )
                          ->nullable();
                }
            );


            Schema::connection( self::DB_CONNECTOR )
                  ->create( self::DB_TABLE_NAME_SUBSCRIPTION, 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;
                    
                    $table->id();

                    $table->bigInteger( 'category_id' )
                          ->unsigned();

                    $table->bigInteger( 'mail_id' )
                          ->unsigned();

                    $table->json( 'content' );
                    
                    $table->timestamps();

                    $table->foreign( 'category_id' )
                          ->references( 'id' )
                          ->on( self::DB_TABLE_NAME_LABEL_SUBSCRIPTION_CATEGORY )
                          ->onDelete( 'CASCADE' );

                    $table->foreign( 'mail_id' )
                          ->references( 'id' )
                          ->on( 'mailing_lists' )
                          ->onDelete( 'CASCADE' );
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
            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_LABEL_SUBSCRIPTION_CATEGORY );

            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_SUBSCRIPTION );
        }
    }; 
?>