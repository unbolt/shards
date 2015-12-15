<?php

namespace Shards;

use Illuminate\Database\Eloquent\Model;

class Spawn extends Model
{

    protected $table = 'spawns';

    public function drops() {
        return $this->hasMany('Shards\Drop');
    }
}
