<?php
    // Needed Libraries
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    use App\Models\AccountModel;

    use App\Models\TypeIPAddressModel;
    use App\Models\LabelIPAddressModel;
    
    use App\Models\PasswordResetsModel;
    use App\Models\FailedJobsModel;
    
    use App\Models\AccountActivityModel;
    use App\Models\UserActivityModel;
    use App\Models\LabelAccountActivityStatusModel;
    
    use App\Models\AccountActivityVisitsModel;
    use App\Models\AccountVerifiedAtModel;
    use App\Models\LabelMailingListsModel;


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
        const DB_TABLE_NAME_ACCOUNT_VERRIFIED_AT     = AccountVerifiedAtModel::DB_TABLE_NAME;
        const DB_TABLE_NAME_ACCOUNT_ACTIVITY_VISITS  = AccountActivityVisitsModel::DB_TABLE_NAME;

        const DB_TABLE_NAME_FAILED_JOBS              = FailedJobsModel::DB_TABLE_NAME;
        const DB_TABLE_NAME_PASSWORD_RESET           = PasswordResetsModel::DB_TABLE_NAME;

        const DB_TABLE_NAME_STATUS              = LabelAccountActivityStatusModel::DB_TABLE_NAME;

        const DB_TABLE_NAME_IP_ADDRESS_TYPE     = TypeIPAddressModel::DB_TABLE_NAME;
        const DB_TABLE_NAME_IP_ADDRESS_LABEL    = LabelIPAddressModel::DB_TABLE_NAME;


        /**
         * 
         */
        public function up()
        {
            /**
             * 
             */
            Schema::connection( self::DB_CONNECTOR )
                  ->create( AccountModel::DB_TABLE_NAME,
                function ( Blueprint $table )
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id();
                    $table->string( 'username' )
                          ->comment('');

                    $table->bigInteger( 'email_id' )
                          ->unsigned()
                          ->unique()
                          ->comment('');

                    $table->string( 'password' )
                          ->comment('');

                    $table->rememberToken()
                          ->comment('');

                    $table->timestamps();

                    $table->foreign( 'email_id' )
                          ->references( 'id' )
                          ->on( LabelMailingListsModel::DB_TABLE_NAME );
                }
            );


            /**
             * 
             */
            Schema::connection( self::DB_CONNECTOR )
                  ->create( self::DB_TABLE_NAME_ACCOUNT_VERRIFIED_AT,
                function ( Blueprint $table )
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id();

                    $table->string( 'content_token' )
                          ->comment('');


                    $table->bigInteger( 'account_id' )
                          ->unsigned()
                          ->unique();

                    $table->foreign( 'account_id' )
                          ->references( 'id' )
                          ->on( AccountModel::DB_TABLE_NAME );

                }
            );


            /**
             * 
             */
            Schema::connection( self::DB_CONNECTOR )
                  ->create( self::DB_TABLE_NAME_STATUS,
                function ( Blueprint $table )
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id();

                    $table->string('content')
                          ->index()
                          ->unique()
                          ->comment('');

                }
            );


            /**
             * 
             */
            Schema::connection( self::DB_CONNECTOR )
                  ->create( self::DB_TABLE_NAME_IP_ADDRESS_TYPE,
                function ( Blueprint $table )
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id();

                    $table->string('content')
                          ->index()
                          ->unique()
                          ->comment('');

                }
            );


            /**
             * 
             */
            Schema::connection( self::DB_CONNECTOR )
                  ->create( self::DB_TABLE_NAME_IP_ADDRESS_LABEL,
                function ( Blueprint $table )
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id();

                    $table->ipAddress('content')
                          ->index()
                          ->unique()
                          ->comment('');

                }
            );


            /**
             * 
             */
            Schema::connection( self::DB_CONNECTOR )
                  ->create( self::DB_TABLE_NAME_ACCOUNT_ACTIVITY_VISITS,
                function ( Blueprint $table )
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id();

                    $table->bigInteger( 'account_id' )
                          ->unsigned()
                          ->comment('')
                          ->index();


                    $table->bigInteger( 'label_account_activity_status_id' )
                          ->unsigned()
                          ->comment('');


                    $table->bigInteger( 'ip_address_id' )
                          ->unsigned()
                          ->comment('')
                          ->index();


                    $table->bigInteger( 'ip_address_type_id' )
                          ->unsigned()
                          ->comment('')
                          ->index();

                    $table->json( 'request' )
                          ->comment('');

                    $table->timestamp( 'authenticated_at' )
                          ->nullable()
                          ->useCurrent()
                          ->comment('');

                    $table->foreign( 'account_id' )
                          ->references( 'id' )
                          ->on( AccountModel::DB_TABLE_NAME );

                    $table->foreign( 'label_account_activity_status_id' )
                          ->references( 'id' )
                          ->on( LabelAccountActivityStatusModel::DB_TABLE_NAME );

                    $table->foreign( 'ip_address_type_id' )
                          ->references( 'id' )
                          ->on( TypeIPAddressModel::DB_TABLE_NAME );

                    $table->foreign( 'ip_address_id' )
                          ->references( 'id' )
                          ->on( LabelIPAddressModel::DB_TABLE_NAME );
                }
            );


            /**
             * 
             */
            Schema::connection( self::DB_CONNECTOR )
                  ->create( self::DB_TABLE_NAME_FAILED_JOBS,
                function ( Blueprint $table )
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id();

                    $table->string( 'uuid' )
                          ->unique()
                          ->comment('');

                    $table->text( 'connection' )
                          ->comment('');

                    $table->text( 'queue' )
                          ->comment('');

                    $table->longText( 'payload' )
                          ->comment('');

                    $table->longText( 'exception' )
                          ->comment('');

                    $table->timestamp( 'failed_at' )
                          ->useCurrent()
                          ->comment('');
                }
            );


            /**
             * 
             */
            Schema::connection( self::DB_CONNECTOR )
                  ->create( self::DB_TABLE_NAME_PASSWORD_RESET,
                function ( Blueprint $table )
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id();

                    $table->bigInteger( 'email_id' )
                          ->unsigned()
                          ->index()
                          ->comment('');

                    $table->string( 'token' )
                          ->comment('');

                    $table->string( 'uuid', 64 )
                          ->comment('')
                          ->index();

                    $table->timestamp( 'created_at' )
                          ->nullable()
                          ->useCurrent()
                          ->comment( '' );

                    $table->timestamp( 'mailed_at' )
                          ->nullable()
                          ->comment( '' );
                  
                    $table->timestamp( 'accessed_at' )
                          ->nullable()
                          ->comment( '' );

                    $table->foreign( 'email_id' )
                          ->references( 'id' )
                          ->on( LabelMailingListsModel::DB_TABLE_NAME );
                }
            );
        }


        /**
         * 
         */
        public function down()
        {
            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_ACCOUNT_VERRIFIED_AT );

            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_ACCOUNT_ACTIVITY_VISITS );

            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_FAILED_JOBS );

            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_PASSWORD_RESET );

            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_STATUS );

            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_IP_ADDRESS_TYPE );

            Schema::connection( self::DB_CONNECTOR )
                  ->dropIfExists( self::DB_TABLE_NAME_IP_ADDRESS_LABEL );
        }
    };
?>
