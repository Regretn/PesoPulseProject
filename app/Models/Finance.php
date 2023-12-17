<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
class Finance extends Model
{
    use HasFactory, SoftDeletes; protected $fillable = [
        'user_id',
        'teams_id',
        'finance_title',
        'finance_amount',
        'finance_description',
        'finance_purchase_date',
        'transaction_type',
        'supplier_address',
        'supplier_name',
        'supplier_phone',
        'finance_tax_amount',
        'finance_tax_rate',
        'document_type',
        'image_path',
        'category_id',
        'file_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function category()
    {
        return $this->hasMany(Category::class);
    }
    public function importedFile()
    {
        return $this->belongsTo(ImportedFile::class);
    }

}
