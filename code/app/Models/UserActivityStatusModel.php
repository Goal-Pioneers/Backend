<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivityStatusModel
    extends Model
{
    use HasFactory;

    public const DB_TABLE_NAME = 'status';
}

?>
