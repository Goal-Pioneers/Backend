<?php
    // Needed Libraries
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    use App\Models\AccountModel;

    use App\Models\TypeIPAddressModel;
    use App\Models\LabelIPAddressModel;

    use App\Models\UserActivityStatusModel;

    use App\Models\UserActivityModel;

    use App\Models\PasswordResetsModel;
    use App\Models\FailedJobsModel;

    use App\Models\AccountActivityStatusModel;
    use App\Models\AccountActivityVisitsModel;
    use App\Models\AccountVerifiedAtModel;

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

        const DB_TABLE_NAME_STATUS              = UserActivityStatusModel::DB_TABLE_NAME;

        const DB_TABLE_NAME_IP_ADDRESS_TYPE     = TypeIPAddressModel::DB_TABLE_NAME;
        const DB_TABLE_NAME_IP_ADDRESS_LABEL    = LabelIPAddressModel::DB_TABLE_NAME;



        public function up()
        {
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
                          ->on( 'mailing_lists' );

                    $table->timestamps();
                }
            );


            Schema::connection( self::DB_CONNECTOR )
                  ->create( self::DB_TABLE_NAME_ACCOUNT_VERRIFIED_AT, 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id();
                    $table->string( 'content_token' );


                    $table->bigInteger( 'account_id' )
                          ->unsigned()
                          ->unique();
                  
                    $table->foreign( 'account_id' )
                          ->references( 'id' )
                          ->on( AccountModel::DB_TABLE_NAME );

                }
            );

            Schema::connection( self::DB_CONNECTOR )
                  ->create( 'status', 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id();
                    $table->string('content')->index();

                }
            );


            Schema::connection( self::DB_CONNECTOR )
                  ->create( 'ip_address_type', 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id();
                    $table->string('content')->index()->unique();

                }
            );


            Schema::connection( self::DB_CONNECTOR )
                  ->create( 'label_ip_address', 
                function ( Blueprint $table ) 
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id();
                    $table->ipAddress('content')->index()->unique();

                }
            );


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


            Schema::connection( self::DB_CONNECTOR )
                  ->create( self::DB_TABLE_NAME_ACCOUNT_ACTIVITY_VISITS,
                function ( Blueprint $table )
                {
                    $table->engine = self::DB_ENGINE_DEFAULT;

                    $table->id();

                    $table->bigInteger( 'account_id' )
                          ->unsigned()
                          ->comment('');

                    $table->bigInteger( 'status_id' )
                          ->unsigned()
                          ->comment('');

                    $table->bigInteger( 'address_id' )
                          ->unsigned()
                          ->comment('');

                    $table->bigInteger( 'address_type_id' )
                          ->unsigned()
                          ->comment('');

                    $table->json( 'request' )
                          ->comment('');

                    $table->timestamp( 'authenticated_at' )
                          ->nullable()
                          ->useCurrent()
                          ->comment('');

                    $table->foreign( 'account_id' )
                          ->references( 'id' )
                          ->on( AccountModel::DB_TABLE_NAME );

                    $table->foreign( 'status_id' )
                          ->references( 'id' )
                          ->on( 'status' );

                    $table->foreign( 'address_type_id' )
                          ->references( 'id' )
                          ->on( 'ip_address_type' );

                    $table->foreign( 'address_id' )
                          ->references( 'id' )
                          ->on( 'label_ip_address' );
                }
            );


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

                    $table->timestamp( 'created_at' )
                          ->nullable()
                          ->useCurrent()
                          ->comment('');

                    $table->foreign( 'email_id' )
                          ->references( 'id' )
                          ->on( 'mailing_lists' );
                }
            );
        }


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
