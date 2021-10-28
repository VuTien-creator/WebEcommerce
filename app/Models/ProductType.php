<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $table = 'product_types';

    protected $fillable = ['user_id','name','slug','status'];

    public function product(){
        return $this->hasMany(Product::class,'product_type_id');
    }
    public function customerGetCategories(){
        return $this->where('status',1)->get('name');
    }


}
