<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeMain($query)
    {
        return $query->where('parent_id', 0);
    }

    public function scopeMainCategories($query, $sectionId)
    {
        return $query->where([['section_id', $sectionId], ['parent_id', 0], ['status', 1]]);
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parentcategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id')->select('id', 'name');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
