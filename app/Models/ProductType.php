<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $table = 'product_types';

    protected $fillable = ['name','status'];

    public const VALIDATE_RULE =   [
        'name' => 'required',
        'status' => 'required|numeric|min:0|max:1'
    ];

    public function product(){
        return $this->hasMany(Product::class,'product_type_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function customerGetCategories(){
        return $this->where('status',1)->get('name');
    }

    public function scopeAdminGetAllProductType($query){
        return ($query->with('user')->get(['id','name','status','user_id','created_at']));
        // return ($query->get());
    }


}
