<?php
    // Needed Libraries
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    use App\Models\LabelAddressCountriesModel;
    use App\Models\LabelAddressCitiesModel;
    use App\Models\LabelAddressProvinces;


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
                          ->unsigned()
                          ->comment('');

                    $table->bigInteger( 'address_field_2_id' )
                          ->unsigned()
                          ->nullable()
                          ->comment('');

                    
                    
                    $table->bigInteger( 'city_id' )
                          ->unsigned()
                          ->comment('');

                    $table->bigInteger( 'post_field_id' )
                          ->unsigned()
                          ->index()
                          ->comment('');

                    $table->bigInteger( 'country_id' )
                          ->unsigned()
                          ->comment('');


                    // References
                    $table->foreign( 'address_field_1_id' )
                          ->references( 'id' )
                          ->on( 'entities_address_field' );

                    $table->foreign( 'address_field_2_id' )
                          ->references( 'id' )
                          ->on( 'entities_address_field' );
                    
                    
                    $table->foreign( 'city_id' )
                          ->references( 'id' )
                          ->on( LabelAddressCitiesModel::DB_TABLE_NAME );

                    $table->foreign( 'post_field_id' )
                          ->references( 'id' )
                          ->on( LabelAddressProvinces::DB_TABLE_NAME );
                    
                    $table->foreign( 'country_id' )
                          ->references( 'id' )
                          ->on( LabelAddressCountriesModel::DB_TABLE_NAME );
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