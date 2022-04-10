<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;


    /**
     * 
     */
    class LabelAddressRoadnamesModel
        extends Model
    {
        use HasFactory;
        public const DB_TABLE_NAME = 'label_address_roadname';
        
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
