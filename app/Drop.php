<?php

namespace Shards;

use Illuminate\Database\Eloquent\Model;

class Drop extends Model
{

    protected $table = 'drops';

    public function spawn() {
        return $this->belongsTo('Shards\Spawn');
    }

    public function droppable() {
        return $this->morphTo();
    }

}
