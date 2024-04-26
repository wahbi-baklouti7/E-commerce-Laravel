<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'image'];

    // protected $casts = [
    //     'created_at' => 'datetime:d-m-Y ',
    //     'deleted_at' => 'datetime:d-m-Y ',
    // ];

    // has many = function end with s
    public function products(){

        return $this->hasMany(Product::class);
    }


    protected function getCreatedAtAttribute($value){

        return date('d-m-Y', strtotime($value));
    }

    protected function getDeletedAtAttribute($value){
        return date('d-m-Y', strtotime($value));
    }

    protected function notHavingImage(){

        return $this->image == null;
    }
}
