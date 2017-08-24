<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Azs extends Model
{
    protected $fillable = [
        'number','name', 'longitude', 'lattitude', 'gasoline_type', 'is_deleted'
    ];

    public function user() {

        return $this->belongsTo('App\User');

    }
}
