<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function records()
    {
        return $this->hasMany('App\Record');
    }

    /**
     * 特定言語の総学習時間を返す
     *
     * @return int
     */
    public function getSumAttribute() 
    {
        if (!$this->records->isEmpty())
        {
        return $this->records->reduce(function ($carry, $record) {
            return $carry + $record->study_time;
        });
        } else {
            return 0;
        }
    }
}
