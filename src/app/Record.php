<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'study_date', 'study_time', 'language_id', 'content_id',
    ];

}
