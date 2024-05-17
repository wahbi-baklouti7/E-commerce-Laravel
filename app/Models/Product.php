<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable=[
        'name',
        'description',
        'price',
        'photo',
        'category_id'
    ];


    public function category(){

        return $this->belongsTo(Category::class);
    }


    public function orderLignes(){

        return $this->hasMany(OrderLigne::class);
    }

    public function orders(){

        return $this->belongsToMany(Order::class);
    }

    protected function getCreatedAtAttribute($value){

        return date('d-m-Y', strtotime($value));
    }

    public function getIsNewAttribute(){

        return Carbon::now()->diffInDays($this->created_at) < config('threshold');
    }


}
