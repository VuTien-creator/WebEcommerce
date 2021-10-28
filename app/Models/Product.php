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

    public function customerGetAllProduct(){
        // $products  = Product::where('status',1)->get(['name','image','price','description']);
        $products  = $this->where('status',1)->paginate(16);
        return $products;
    }

    public function customerGetProductById($id){
        return $this->where('status',1)->findOrFail($id);
    }

    public function customerGetRelateProduct($typeProductId){
        // return $this->where('product_type_id',$typeProductId)->where('status',1)->firstOrFail();
        return $this->where('product_type_id',$typeProductId)->where('status',1)->get();
    }

    public function customerGetLatestProduct(){
        return $products = Product::where('status',1)->latest()->take(8)->get();
    }

    public function customerScopeSearch($query, $val){
        return $query->where('name','like','%'.$val.'%')
                ->orWhere('price','like','%'.$val.'%')->where('status',1);
    }

    public function customerScopeGetImageById($query, $id){
        return $query->where('id',$id)->first('image');
    }
}
