<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;
    
    public function blogs()
    {
        return $this->belongsToMany('App\Models\blogs');
    }
}
