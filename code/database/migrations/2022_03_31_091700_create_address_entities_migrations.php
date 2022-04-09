<?php
    // Needed Libraries
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    use App\Models\LabelAddressApartmentsModel;
    use App\Models\LabelAddressRoadnamesModel;
    use App\Models\LabelAddressRegionsModel;


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
        const DB_TABLE_NAME_ADDRESS_FIELD     = 'entities_address_field';
        const DB_TABLE_NAME_POST_FIELD        = 'entities_post_field';


        
        public function up()
        {
            //
            Schema::connection( self::DB_CONNECTOR )
                  ->create( self::DB_TABLE_NAME_POST_FIELD, 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id();

                    $table->integer( 'zip_code' )
                          ->unsigned()
                          ->index()
                          ->comment('');

                    $table->bigInteger( 'region_id' )
                          ->unsigned()
                          ->comment('');

                    $table->foreign( 'region_id' )
                          ->references( 'id' )
                          ->on( LabelAddressRegionsModel::DB_TABLE_NAME );
                }
            );


            //
            Schema::connection( self::DB_CONNECTOR )
                ->create( self::DB_TABLE_NAME_ADDRESS_FIELD, 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id(); 

                    $table->bigInteger( 'roadname_id' )
                          ->unsigned()
                          ->comment('');

                    $table->integer( 'road_number' )
                          ->unsigned()
                          ->comment('');

                    $table->integer( 'level' )
                          ->unsigned()
                          ->comment('');

                    $table->bigInteger( 'apartment_id' )
                          ->unsigned()
                          ->comment('');
                    

                    $table->foreign( 'roadname_id' )
                          ->references( 'id')
                          ->on( LabelAddressRoadnamesModel::DB_TABLE_NAME );

                    $table->foreign( 'apartment_id' )
                          ->references( 'id' )
                          ->on( LabelAddressApartmentsModel::DB_TABLE_NAME );
                }
            );
        }



        
        public function down()
        {
            //
            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_ADDRESS_FIELD );

            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_POST_FIELD );
        }
    };
?>