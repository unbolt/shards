<?php

namespace Shards;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{

    protected $table = 'races';

    protected $hidden = array('id', 'created_at', 'updated_at');

}
