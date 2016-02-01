<?php

namespace Shards;

use Illuminate\Database\Eloquent\Model;

class CharacterMission extends Model
{

    protected $table = 'character_missions';

    public function mission() {
        return $this->belongsTo('Shards\Mission');
    }

    public function character() {
        return $this->belongsTo('Shards\Character');
    }


}
