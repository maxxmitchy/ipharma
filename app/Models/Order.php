<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(Order::class);
    }

    public function scopeUnpaid($query)
    {
        return $query->where('payment_status', 0);
    }

    public function scopeStatus($query, $value)
    {
        return $query->where('status', $value);
    }

    public function orderitems()
    {
        return $this->hasMany(OrdersItem::class);
    }
}
