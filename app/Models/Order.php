<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'product_id',
        'quantity',
        'total_price',
        'status',
        'address',
        'phone',
        'first_name',
        'last_name',
        'email',
        'city',
        'postal_code',
        'notes',
    ];



    public function __construct()
    {
        // DB::table('order_lignes')->truncate();
        // DB::table('orders')->truncate();
    }

    public function orderLignes(){
        return $this->hasMany(OrderLigne::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }


    public function getFullNameAttribute(){

        return $this->first_name.' '.$this->last_name;
    }


    public function getCreatedAtAttribute($value){

        return date('d-m-Y', strtotime($value));
    }

}
