<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory; 
    protected $fillable = [
        'user_id',
        'teams_id',
        'title',
        'content',
        'important'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

}
