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
        // Preperation
            // Base
        const DB_CONNECTOR = 'mysql';
        const DB_ENGINE_DEFAULT = 'InnoDB';

            // Table Names
        const DB_TABLE_NAME_PROVINCE        = 'label_address_province';
        const DB_TABLE_NAME_COUNTRY         = 'label_address_country';
        const DB_TABLE_NAME_CITY            = 'label_address_city';
        const DB_TABLE_NAME_ROADNAME        = 'label_address_roadname';
        const DB_TABLE_NAME_REGION          = 'label_address_region';
        const DB_TABLE_NAME_APARTMENT       = 'label_address_apartment';
        
            // Columns
        const DB_COLUMN_CONTENT = 'content';

        
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::connection( self::DB_CONNECTOR )
                ->create( self::DB_TABLE_NAME_COUNTRY, 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;
                    $table->id(); 
                    $table->string( self::DB_COLUMN_CONTENT )->unique();
                }
            );


            Schema::connection( self::DB_CONNECTOR )
                ->create( self::DB_TABLE_NAME_CITY, 
                function( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;
                    $table->id();
                    $table->string( self::DB_COLUMN_CONTENT )->unique();
                }
            );


            Schema::connection( self::DB_CONNECTOR )
                ->create( self::DB_TABLE_NAME_PROVINCE, 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;
                    $table->id(); 
                    $table->string( self::DB_COLUMN_CONTENT )->unique();
                }
            );   


            Schema::connection( self::DB_CONNECTOR )
                ->create( self::DB_TABLE_NAME_ROADNAME, 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;
                    $table->id(); 
                    $table->string( self::DB_COLUMN_CONTENT )->unique();
                }
            );


            Schema::connection( self::DB_CONNECTOR )
                ->create( self::DB_TABLE_NAME_REGION, 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;
                    $table->id(); 
                    $table->string( self::DB_COLUMN_CONTENT )->unique();
                }
            );


            Schema::connection( self::DB_CONNECTOR )
                ->create( self::DB_TABLE_NAME_APARTMENT, 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;
                    $table->id(); 
                    $table->string( self::DB_COLUMN_CONTENT )->unique();
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
            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_COUNTRY );

            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_CITY );

            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_PROVINCE );

            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_ROADNAME );
            
            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_REGION );

            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_APARTMENT );
        }
    };
?>