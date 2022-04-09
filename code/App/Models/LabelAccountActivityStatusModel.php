<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;


    /**
     * 
     */
    class LabelAccountActivityStatusModel 
        extends Model
    {
        use HasFactory;

        public const DB_TABLE_NAME = 'label_account_activity_status';

        protected $table = self::DB_TABLE_NAME;
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