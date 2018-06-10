<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Word extends Model
{
    use SoftDeletes;

    protected $fillable = ['word', 'mean', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
