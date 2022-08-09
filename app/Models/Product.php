<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        "product_name",
        "first_price",
        "reduction_rate",
        "product_description",
        "product_date_end",
        "id_category"
    ];
    public $timestamps= false;

    public function category()
    {
        return $this->belongsTo(Category::class,'id_category','id');
    }
}
