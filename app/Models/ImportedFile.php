<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImportedFile  extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'teams_id',
        'user_id',
        'file_name',
        'date_start',
        'date_end',
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function finances()
    {
        return $this->hasMany(Finance::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
