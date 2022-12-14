<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    function whereBody($body)
    {
        return $this->where('body', $body)->first();
    }

    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = strtolower($value);
    }
}
