<?php

namespace Shards;

use Illuminate\Database\Eloquent\Model;

class Armour extends Model
{

    protected $table = 'armour';

    protected $appends = array('type');

    public function droppedBy() {
        return $this->morphMany('Shards\Drop', 'droppable');
    }

    public function getTypeAttribute() {
        // This feels dirty, but its making life so much easier on the front end
        return 'armour';
    }
}
