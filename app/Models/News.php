<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    // Define the fillable columns
    protected $fillable = [
        'title',
        'category',
        'content',
        'image',
        'visitors',
        // Add more columns if necessary
    ];
    public function getCreatedAtAttribute($value)
        {
            return \Carbon\Carbon::parse($value)->format('d.m.Y');
        }
    public function scopeByCategory($query, $category)
        {
            return $query->where('category', $category);
        }
    public function category()
        {
            return $this->belongsTo('App\Models\Categories', 'category_id');
        }
}

