<?php

use Illuminate\Database\Seeder;
use App\Category;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run()
    {

    App\Category::create([
       'name'=>'Hommes',

     ]);

    App\Category::create([
       'name'=>'Femmes',

     ]);

        //Création de 80 produits avec des données aléatoires
    factory(App\Product::class,80)->create()->each(function($product){

        $categorieAleatoire = rand(1 , 2);

        $categoryFound= Category::find($categorieAleatoire) ;

        $product->categorie()->associate($categoryFound);

        //On vérifie le type de catégorie

        switch( $categorieAleatoire){
                case 1: $images=glob(public_path().'/images/hommes/*');
                        $productImg = $images[array_rand($images)];
                    break;
                case 2: $images=glob(public_path().'/images/femmes/*');
                        $productImg = $images[array_rand($images)];
                    break;
            }

                //on génère une image 

                $product->picture = basename($productImg);
                $product->save();
            });
        }
}
