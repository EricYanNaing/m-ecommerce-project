<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','supplier_id','brand_id','name','image','discount_price','sale_price','total_quantity','view_count','sale_count'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function color(){
        return $this->belongsToMany(Color::class);
    }
    public function transaction(){
        return $this->hasMany(ProductAddTransaction::class);
    }
    public function cart(){
        return $this->hasMany(ProductCart::class);
    }
    public function order(){
        return $this->hasMany(ProductOrder::class);
    }
    public function review(){
        return $this->hasMany(ProductReview::class);
    }
}
