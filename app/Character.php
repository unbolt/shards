<?php

namespace Shards;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{

    protected $table = 'characters';

    public function user()
    {
        return $this->belongsTo('Shards\User');
    }

    public function job()
    {
        return $this->belongsTo('Shards\Job');
    }

    public function race()
    {
        return $this->belongsTo('Shards\Race');
    }

}
