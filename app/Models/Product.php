<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = ['name','product_type_id','slug','status','image','price','description'];

    public function productType(){
        return $this->belongsTo(ProductType::class,'product_type_id');
    }

    public static function customerGetAllProduct(){
        $products  = (new static)::where('status',1)->paginate(15);
        // $products  = $this->where('status',1)->paginate(15);
        return $products;
    }

    public function customerGetProductById($id){
        return $this->where('status',1)->findOrFail($id);
    }

    public function customerGetRelateProduct($typeProductId){
        // return $this->where('product_type_id',$typeProductId)->where('status',1)->firstOrFail();
        return $this->where('status',1)->where('product_type_id',$typeProductId)->get(['id','name','price','image']);
    }

    public function customerGetLatestProduct(){
        return $products = Product::where('status',1)->latest()->take(8)->get();
    }

    public function scopeCustomerSearch($query, $val){
        return $query->where('name','like','%'.$val.'%')
                ->orWhere('price','like','%'.$val.'%')->where('status',1);
    }

    public function scopeCustomerGetImageById($query, $id){
        return $query->where('id',$id)->first('image');
    }
}
