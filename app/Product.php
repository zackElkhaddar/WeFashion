<?php

namespace App;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','description','price','size','picture'];

  public function categorie(){

     return $this->belongsTo(Category::class);
     
   }
}
