<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class visitors extends Model
{
    protected $fillable = ['ip_address','url','country'];
}
