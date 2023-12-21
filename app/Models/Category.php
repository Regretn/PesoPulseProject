<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'user_id',
        'teams_id'

    ];
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
    public static function findSimilar($excelCategory, $user_id)
    {

        $categories = self::where(function ($query) use ($user_id) {
            $query->where('user_id', $user_id)
                  ->orWhere('user_id', 3);
        })

        ->get();        
        $bestMatch = null;
        $minDistance = PHP_INT_MAX;

        foreach ($categories as $category) {
            $distance = levenshtein(strtolower($excelCategory), strtolower($category->category_name));
    
            if ($distance < $minDistance) { 
                $minDistance = $distance;
                $bestMatch = $category;
            }
        }

        $similarityThreshold = 0.7; 
        if ($minDistance <= $similarityThreshold * strlen($excelCategory)) {
            return $bestMatch;
        }
        return null; 
    }
    
    
}

