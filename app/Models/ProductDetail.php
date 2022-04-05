<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $table = 'productdetail';
    protected $primaryKey = 'idProductDetail';
    protected $fillable = ['idProduct', 'price', 'imgUrl', 'quantity'];
}
