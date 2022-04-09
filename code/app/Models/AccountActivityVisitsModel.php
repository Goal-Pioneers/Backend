<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;


    /**
     * 
     */
    class AccountActivityVisitsModel
        extends Model
    {
        use HasFactory;

        public const DB_TABLE_NAME = 'account_activity_visits';
        
        protected $primaryKey = 'id';

        protected $fillable =
        [
            'content'
        ];


        protected $hidden =
        [

        ];


        protected $casts =
        [

        ];
    }

?>
