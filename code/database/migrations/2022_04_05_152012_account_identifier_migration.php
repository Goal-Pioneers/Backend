<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        const DB_TABLE_NAME_ACCOUNT_ID = 'account_identifier';
        const DB_TABLE_NAME_APPLICATION = 'label_application_software';


        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create( self::DB_TABLE_NAME_APPLICATION, 
                function ( Blueprint $table ) 
                {
                    $table->id();
                    $table->uuid( 'identifier' )->index();

                    $table->string('title');
                    $table->longText('description');
                }
            );
            

            //
            Schema::create( self::DB_TABLE_NAME_ACCOUNT_ID, 
                function ( Blueprint $table ) 
                {
                    $table->id(); 

                    $table->bigInteger( 'user_id' )->unsigned();
                    $table->bigInteger( 'application_id' )->unsigned();
                    
                    $table->uuid( 'identifier' )->index();

                    $table->foreign('user_id')->references('id')->on('users');
                    $table->foreign('application_id')->references('id')->on( self::DB_TABLE_NAME_APPLICATION );
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
            Schema::dropIfExists( self::DB_TABLE_NAME_APPLICATION );
            Schema::dropIfExists( self::DB_TABLE_NAME_ACCOUNT_ID );
        }
    };

?>