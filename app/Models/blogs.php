<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Parsedown;

class blogs extends Model
{
    protected $table = "blogs";

    protected $fillable = ['title','content'];

    public function getResultAttribute()
    {
        $Parsedown = new Parsedown();
        return  $Parsedown->text($this->content);
    }

}
