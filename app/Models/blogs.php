<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blogs extends Model
{
    protected $table = "blogs";

    protected $fillable = ['title','content'];


}
