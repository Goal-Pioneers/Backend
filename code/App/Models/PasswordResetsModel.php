<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class PasswordResetsModel 
        extends Model
    {
        use HasFactory;
        public const DB_TABLE_NAME = 'password_resets';

        protected $table = self::DB_TABLE_NAME;
        public $timestamps = false;
        
        protected $primaryKey = 'id';

        
        protected $fillable = 
        [
            'email_id',
            'token',
            'created_at'
        ];


        
        protected $hidden = 
        [

        ];

        
        
        protected $casts = 
        [
            'created_at' => 'datetime'
        ];

    }

?>