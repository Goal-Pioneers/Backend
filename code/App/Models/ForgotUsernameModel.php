<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;


    class ForgotUsernameModel 
        extends Model
    {
        use HasFactory;
        public const DB_TABLE_NAME = 'forgot_username';
        
        protected $table = self::DB_TABLE_NAME;
        public $timestamps = false;

        protected $primaryKey = 'id';

        protected $fillable =
        [
            'email_id',
            'token',
            'created_at',
            'uuid',
            'mailed_at',
            'accessed_at'
        ];


        protected $hidden =
        [
            'created_at',
            'mailed_at',
            'accessed_at',
            'token'
        ];


        protected $casts =
        [
            'created_at' => 'datetime',
            'mailed_at' => 'datetime',
            'accessed_at' => 'datetime'
        ];

    }

?>