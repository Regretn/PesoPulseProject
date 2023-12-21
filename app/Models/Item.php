<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'finance_id',
        'teams_id',
        'item_name',
        'item_quantity',
        'user_id',
        'item_unit_price',
        'item_total_amount'
    ];
    public function finance()
    {
        return $this->belongsTo(Finance::class, 'finance_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
