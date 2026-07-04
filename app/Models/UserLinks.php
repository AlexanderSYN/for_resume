<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

class UserLinks extends Model
{
    protected $fillable = [
        'user_id',
        'original_link',
        'short_code',
    ];

    public function visits()
    {
        return $this->hasMany(LinkVisit::class, 'user_link_id');
    }
}
