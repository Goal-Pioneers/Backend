<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class FailedJobsModel
        extends Model
    {
        public const DB_TABLE_NAME = 'failed_jobs';
        use HasFactory;
    }
?>
