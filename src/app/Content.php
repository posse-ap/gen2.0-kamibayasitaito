<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function records()
    {
        return $this->hasMany('App\Record');
    }

    /**
     * 特定コンテンツの総学習時間を返す
     *
     * @return int
     */
    public function getSumAttribute()
    {
        return $this->records->reduce(function ($carry, $record) {
            return $carry + $record->study_time;
        });
    }
}
