<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyUsers extends Model
{

    protected $fillable = [
        'name', 'email', 'token_id', 'picture_url', 'is_deleted'
    ];

}
