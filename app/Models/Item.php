<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';
    protected $fillable = ['cutomer_id', 'product_id', 'category_id', 'quantity', 'price', 'total'];

    public function product_details()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user_details()
    {
        return $this->belongsTo(User::class, 'cutomer_id', 'id');
    }
}
