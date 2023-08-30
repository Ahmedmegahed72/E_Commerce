<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Order;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';

    function category()
    {
        return $this->belongsTo(Category::class);
    }
    function order()
    {
        return $this->belongsTo(Order::class);
    }

}