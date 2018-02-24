<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Parsedown;
use App\Models\comments;

class blogs extends Model
{
    protected $table = "blogs";

    protected $fillable = ['title','content'];

    public function getResultAttribute()
    {
        $Parsedown = new Parsedown();
        return  $Parsedown->text($this->content);
    }

    public function comments(){
        return $this->hasMany(comments::class);
    }

}
