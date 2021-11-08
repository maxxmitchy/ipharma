<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeActive($query, $active)
    {
        return $query->where('status', $active);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
