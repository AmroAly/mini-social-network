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
}
