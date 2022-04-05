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
            
            // Table names
        const DB_TABLE_NAME_ADDRESS = 'account_address';


        
        public function up()
        {
            //
            Schema::connection( self::DB_CONNECTOR )
                ->create( self::DB_TABLE_NAME_ADDRESS, 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id(); 


                    $table->bigInteger( 'address_field_1_id' )
                          ->unsigned();

                    $table->bigInteger( 'address_field_2_id' )
                          ->unsigned()
                          ->nullable();

                    
                    
                    $table->bigInteger( 'city_id' )
                          ->unsigned();

                    $table->bigInteger( 'post_field_id' )
                          ->unsigned()
                          ->index();

                    $table->bigInteger( 'country_id' )
                          ->unsigned();


                    // References
                    $table->foreign( 'address_field_1_id' )
                          ->references( 'id' )
                          ->on( 'entities_address_field' );

                    $table->foreign( 'address_field_2_id' )
                          ->references( 'id' )
                          ->on( 'entities_address_field' );
                    
                    $table->foreign( 'city_id' )
                          ->references( 'id' )
                          ->on( 'label_address_city' );

                    $table->foreign( 'post_field_id' )
                          ->references( 'id' )
                          ->on( 'entities_post_field' );
                    
                    $table->foreign( 'country_id' )
                          ->references( 'id' )
                          ->on( 'label_address_country' );
                }
            );
        }


        
        public function down()
        {
            //
            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_ADDRESS );
        }
    };
?>