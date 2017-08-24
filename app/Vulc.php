<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vulc extends Model
{
    protected $fillable = [
        'number','name', 'longitude', 'lattitude', 'is_deleted'
    ];

    public function user() {

        return $this->belongsTo('App\User');

    }
}
