<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    /**
     * 
     */
    class MailingListsModel 
        extends Model
    {
        use HasFactory;

        public const DB_TABLE_NAME = 'mailing_lists';

        protected $table = self::DB_TABLE_NAME;
        public $timestamps = false;
        
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