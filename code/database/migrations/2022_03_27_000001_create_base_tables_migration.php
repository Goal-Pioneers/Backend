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
        const DB_TABLE_NAME_ACCOUNT                  = 'users';
        
        const DB_TABLE_NAME_ACCOUNT_ACTIVITY_VISITS  = 'account_activity_visits';

        const DB_TABLE_NAME_FAILED_JOBS              = 'failed_jobs';
        const DB_TABLE_NAME_PASSWORD_RESET           = 'password_resets';


        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::connection('mysql')
                ->create( self::DB_TABLE_NAME_ACCOUNT, 
                function ( Blueprint $table ) 
                {
                    $table->engine = 'InnoDB';

                    $table->id();
                    $table->string('username');
                    
                    
                    $table->bigInteger('email_id')->unsigned()->unique();
                    $table->timestamp('email_verified_at')->nullable()->useCurrent();

                    $table->string('password');
                    $table->rememberToken();
                    $table->timestamps();

                    $table->foreign('email_id')->references('id')->on('mailing_lists');
                }
            );


            Schema::connection('mysql')
                ->create( self::DB_TABLE_NAME_ACCOUNT_ACTIVITY_VISITS, 
                function ( Blueprint $table ) 
                {
                    $table->engine = 'InnoDB';
                    $table->id();

                    $table->bigInteger('account_id')->unsigned();
                    
                    $table->ipAddress('address');
                    
                    $table->timestamp('authenticated_at')->nullable()->useCurrent();

                    $table->foreign('account_id')->references('id')->on('users');
                }
            );

            
            Schema::connection('mysql')
                ->create( self::DB_TABLE_NAME_FAILED_JOBS, 
                function ( Blueprint $table ) 
                {
                    $table->engine = 'InnoDB';

                    $table->id();
                    $table->string('uuid')->unique();
                    $table->text('connection');
                    $table->text('queue');
                    $table->longText('payload');
                    $table->longText('exception');
                    $table->timestamp('failed_at')->useCurrent();
                }
            );


            Schema::connection('mysql')
                ->create( self::DB_TABLE_NAME_PASSWORD_RESET, 
                function ( Blueprint $table ) 
                {
                    $table->engine = 'InnoDB';
                    
                    $table->id();

                    $table->bigInteger('email_id')->unsigned()->index();

                    $table->string('token');
                    
                    $table->timestamp('created_at')->nullable()->useCurrent();
                    $table->foreign('email_id')->references('id')->on('mailing_lists');
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
            Schema::connection('mysql')->dropIfExists( self::DB_TABLE_NAME_ACCOUNT );
            Schema::connection('mysql')->dropIfExists( self::DB_TABLE_NAME_FAILED_JOBS );
            Schema::connection('mysql')->dropIfExists( self::DB_TABLE_NAME_PASSWORD_RESET );
        }
    };
?>