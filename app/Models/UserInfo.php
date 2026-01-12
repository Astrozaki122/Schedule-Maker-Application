<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'username',
        'phone_number',
        'address',
        'date_of_birth',
        'user_id'
    ];

    public function events() {
        return $this->hasMany(Events::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
