<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderLigne extends Model
{
    use HasFactory;


    protected $fillable=[
        'order_id',
        'product_id',
        'quantity',
        'price',
        'total_price',
    ];

    public function __construct()
    {
        // DB::table('order_lignes')->delete();
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
