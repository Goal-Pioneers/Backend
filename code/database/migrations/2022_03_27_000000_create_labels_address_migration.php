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
        const DB_TABLE_NAME_PROVINCE        = 'label_address_province';
        const DB_TABLE_NAME_COUNTRY         = 'label_address_country';
        const DB_TABLE_NAME_CITY            = 'label_address_city';
        const DB_TABLE_NAME_ROADNAME        = 'label_address_roadname';
        const DB_TABLE_NAME_REGION          = 'label_address_region';
        const DB_TABLE_NAME_APARTMENT       = 'label_address_apartment';
        
        const DB_COLUMN_CONTENT = 'content';

        
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::connection('mysql')
                ->create( self::DB_TABLE_NAME_COUNTRY, 
                function ( Blueprint $table ) 
                {
                    $table->engine = 'InnoDB';
                    $table->id(); 
                    $table->string( self::DB_COLUMN_CONTENT )->unique();
                }
            );


            Schema::connection('mysql')
                ->create( self::DB_TABLE_NAME_CITY, 
                function( Blueprint $table ) 
                {
                    $table->engine = 'InnoDB';
                    $table->id();
                    $table->string( self::DB_COLUMN_CONTENT )->unique();
                }
            );


            Schema::connection('mysql')
                ->create( self::DB_TABLE_NAME_PROVINCE, 
                function ( Blueprint $table ) 
                {
                    $table->engine = 'InnoDB';
                    $table->id(); 
                    $table->string( self::DB_COLUMN_CONTENT )->unique();
                }
            );   


            Schema::connection('mysql')
                ->create( self::DB_TABLE_NAME_ROADNAME, 
                function ( Blueprint $table ) 
                {
                    $table->engine = 'InnoDB';
                    $table->id(); 
                    $table->string( self::DB_COLUMN_CONTENT )->unique();
                }
            );


            Schema::connection('mysql')
                ->create( self::DB_TABLE_NAME_REGION, 
                function ( Blueprint $table ) 
                {
                    $table->engine = 'InnoDB';
                    $table->id(); 
                    $table->string( self::DB_COLUMN_CONTENT )->unique();
                }
            );


            Schema::connection('mysql')
                ->create( self::DB_TABLE_NAME_APARTMENT, 
                function ( Blueprint $table ) 
                {
                    $table->engine = 'InnoDB';
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
            Schema::connection('mysql')->dropIfExists( self::DB_TABLE_NAME_COUNTRY );
            Schema::connection('mysql')->dropIfExists( self::DB_TABLE_NAME_CITY );
            Schema::connection('mysql')->dropIfExists( self::DB_TABLE_NAME_PROVINCE );
            Schema::connection('mysql')->dropIfExists( self::DB_TABLE_NAME_ROADNAME );
            Schema::connection('mysql')->dropIfExists( self::DB_TABLE_NAME_REGION );
            Schema::connection('mysql')->dropIfExists( self::DB_TABLE_NAME_APARTMENT );
        }
    };
?>