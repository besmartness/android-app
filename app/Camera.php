<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camera extends BaseModel
{
    protected $fillable = [
        'name', 'longitude', 'lattitude', 'is_deleted'
    ];

    public function user() {

        return $this->belongsTo('App\User');

    }
}
