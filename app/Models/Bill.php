<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $fillable =['user_id','total_price'];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot(['quantity','price']);
    }
}
