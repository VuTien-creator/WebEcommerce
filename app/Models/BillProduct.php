<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillProduct extends Model
{
    use HasFactory;
    protected $table = 'bill_product';

    protected $fillable =['bill_id','product_id','price','quantity'];

    public function bill(){
        // return $this->belongsTo(Bill::)
    }
}
