<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
class UserDetail extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
     
}
