<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;


    /**
     * 
     */
    class AccountVerifiedAtModel 
        extends Model
    {
        use HasFactory;
        public const DB_TABLE_NAME = 'account_verified_at';
        
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