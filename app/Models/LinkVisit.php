<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkVisit extends Model
{
    protected $fillable = [
        'user_link_id',
        'ip_address',
        'user_agent',
    ];

    public function link()
    {
        return $this->belongsTo(UserLinks::class, 'user_link_id');
    }

}
