<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'location',
        'user_info_id'
    ];

    public function userInfo() {
        return $this->belongsTo(UserInfo::class);
    }
}
