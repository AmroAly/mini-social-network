<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Status extends Model
{
    protected $table = 'statuses';

    protected $fillable = ['body'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    // get only the statuses with null value in the parent_id column which is basicaly the main statuses
    public function scopeNotReply($query)
    {
        return $query->whereNull('parent_id');
    }

    public function replies()
    {
        return $this->hasMany('App\status', 'parent_id');
    }
}
