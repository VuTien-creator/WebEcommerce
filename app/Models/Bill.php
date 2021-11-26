<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $fillable = ['user_id', 'total_price','path_qr_code'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity', 'price']);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function billProduct()
    {
        return $this->hasMany(BillProduct::class, 'bill_id');
    }

    public function joinWithUser()
    {

        return $table = DB::table('bills')
            ->join('users', 'user_id', '=', 'users.id')
            ->select('bills.*', 'users.name')
            ->get();
    }

    public function getBillDetail($id)
    {
        return DB::table('bills')
            ->join('bill_product', 'bills.id', '=', 'bill_product.bill_id')
            ->where('bills.id','=',$id)
            ->join('users', 'users.id', '=', 'bills.user_id')
            ->join('products', 'products.id', '=', 'bill_product.product_id')
            ->select(
                'bills.total_price as bill_total',
                'bills.created_at as bill_created',
                'bills.path_qr_code',

                'users.name as customer_name',
                'users.email as customer_email',

                'bill_product.price as product_price',
                'bill_product.quantity',

                'products.name as product_name',
                'products.image as product_image',

            )
            ->get();
    }
    public function scopeAdminGetAllBill($query)
    {
        return $this->joinWithUser();
    }

    public function genarateQRcode($id){

    }
}