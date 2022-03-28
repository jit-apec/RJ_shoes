<?php

namespace App\Modules\Cart\Models;

use App\Modules\Product\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    public $table="carts";
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',

    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id' , 'id');
    }
}
