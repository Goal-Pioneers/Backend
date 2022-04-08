<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class MailingListsModel 
        extends Model
    {
        use HasFactory;

        protected $table = 'mailing_lists';
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