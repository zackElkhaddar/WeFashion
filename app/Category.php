<?php

namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table='categories';
    protected $fillable=['name'];

  public function produits(){

     return $this->hasMany(Product::class);
     
   }
}
