<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'completed_on'
    ];
}
