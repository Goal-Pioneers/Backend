<?php
    // Needed Libraries
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    use App\Models\LabelAddressApartmentsModel;
    use App\Models\LabelAddressCountriesModel;
    use App\Models\LabelAddressCitiesModel;
    use App\Models\LabelAddressProvinces;
    use App\Models\LabelAddressRoadnamesModel;
    use App\Models\LabelAddressRegionsModel;



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
        const DB_TABLE_NAME_PROVINCE        = LabelAddressProvinces::DB_TABLE_NAME;
        const DB_TABLE_NAME_COUNTRY         = LabelAddressCountriesModel::DB_TABLE_NAME;
        const DB_TABLE_NAME_CITY            = LabelAddressCitiesModel::DB_TABLE_NAME;
        const DB_TABLE_NAME_ROADNAME        = LabelAddressRoadnamesModel::DB_TABLE_NAME;
        const DB_TABLE_NAME_REGION          = LabelAddressRegionsModel::DB_TABLE_NAME;
        const DB_TABLE_NAME_APARTMENT       = LabelAddressApartmentsModel::DB_TABLE_NAME;

            // Columns
        const DB_COLUMN_CONTENT = 'content';


        public function up()
        {
            Schema::connection( self::DB_CONNECTOR )
                ->create( self::DB_TABLE_NAME_COUNTRY,
                function ( Blueprint $table )
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id()
                          ->comment('');

                    $table->string( self::DB_COLUMN_CONTENT )
                          ->unique()
                          ->comment('');
                }
            );


            Schema::connection( self::DB_CONNECTOR )
                ->create( self::DB_TABLE_NAME_CITY,
                function( Blueprint $table )
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id()
                          ->comment('');

                    $table->string( self::DB_COLUMN_CONTENT )
                          ->unique()
                          ->comment('');
                }
            );


            Schema::connection( self::DB_CONNECTOR )
                ->create( self::DB_TABLE_NAME_PROVINCE,
                function ( Blueprint $table )
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id()
                          ->comment('');

                    $table->string( self::DB_COLUMN_CONTENT )
                          ->unique()
                          ->comment('');
                }
            );


            Schema::connection( self::DB_CONNECTOR )
                ->create( self::DB_TABLE_NAME_ROADNAME,
                function ( Blueprint $table )
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id()
                          ->comment('');

                    $table->string( self::DB_COLUMN_CONTENT )
                          ->unique()
                          ->comment('');
                }
            );


            Schema::connection( self::DB_CONNECTOR )
                ->create( self::DB_TABLE_NAME_REGION,
                function ( Blueprint $table )
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id()
                          ->comment('');

                    $table->string( self::DB_COLUMN_CONTENT )
                          ->unique()
                          ->comment('');
                }
            );


            Schema::connection( self::DB_CONNECTOR )
                ->create( self::DB_TABLE_NAME_APARTMENT,
                function ( Blueprint $table )
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id()
                          ->comment('');

                    $table->string( self::DB_COLUMN_CONTENT )
                          ->unique()
                          ->comment('');
                }
            );
        }



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
