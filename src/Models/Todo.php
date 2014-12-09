<?php namespace Dimsav\Todo\Models;

use Eloquent;

class Todo extends Eloquent {

    public function getFinishedAttribute($value)
    {
        return (boolean) $value;
    }

}
