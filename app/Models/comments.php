<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table = "comments";
    protected $fillable = ['blogs_id','user_id','body'];


}
