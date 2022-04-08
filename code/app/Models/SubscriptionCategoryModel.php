<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class SubscriptionCategoryModel 
        extends Model
    {
        use HasFactory;

        protected $table = 'subscription_category';
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