<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function scopeSearch($query, string $terms = null)
    {
        collect(str_getcsv($terms, ' ', '"'))->filter()->each(function ($term) use($query) {
            $term = $term.'%';
            $query->where(function ($query) use($term){
                $query->where('product_name', 'like', $term)
                    ->orWhereIn('category_id', Category::query()
                        ->where('name', 'like', $term)
                        ->pluck('id')
                );
            });
        });
    }

    public function scopeNew($query)
    {
        return $query->where([['status', 1], ['created_at', '>' , now()->subMonth()]]);
    }

    public function scopeTop($query)
    {
        return $query->where([['order_count', '>' , 10], ['created_at', '>' , now()->subMonth()]]);
    }

    public function scopeGetProduct($query, $id)
    {
        return $query->with('productattribute:product_id,price,stock,sku','category:id,name','brand:id,name')->where('id', $id)
                    ->Select('id', 'product_name', 'discount_id', 'category_id', 'brand_id')->get()->toArray()[0];
    }

    public function relatedProducts()
    {
            return $this->belongsToMany(Product::class, 'product_related', 'product_id', 'product_related_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function section() : BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function banners()
    {
        return $this->belongsToMany(Brand::class);
    }

    public function productattribute()
    {
        return $this->hasOne(ProductAttribute::class);
    }

    public static function last()
    {
        return static::all()->last();
    }

    public function registerMediaCollections(Media $media = null): void
    {
        $this->addMediaConversion('display')->optimize()->withResponsiveImages()->performOnCollections('main','subImages');

        $this->addMediaConversion('thumb')
                ->width(100)
                ->height(100)
                ->performOnCollections('subImages');
    }

    public function discount()
    {
        if(is_null($this->percentagediscount)){
            return 0;
        }
        return number_format($this->productattribute->price - ($this->productattribute->price * $this->percentagediscount->value));
    }

    public function percentagediscount()
    {
        return $this->belongsTo(Discount::class, 'discount_id');
    }

    public function ingredients() : HasMany
    {
        return $this->hasMany(Ingredient::class);
    }

    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('rating');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    protected $casts = [
        'manufacturing_date' => 'datetime',
        'expiry_date' => 'datetime',
    ];

}
