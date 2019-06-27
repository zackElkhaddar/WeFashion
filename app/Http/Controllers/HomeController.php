<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function accueil(){

        $produits = Product::orderBy('id','desc')->paginate(6); //on affiche tous les produits de la table product du dernier produit avec un affichage de 6 produits par page et pagination
        
        $results=Product::all();//on récupère tous les produits et on les stock dans results pour les compter
        $counts=$results->count();
        return view('accueil',['produits'=>$produits],compact('produits','counts'));
    }

    public function solde(){

        $products = Product::where('statut','sales')->paginate(6); //on affiche tous les produits dont les statut est solde avec un affichage de 6 produits par page et pagination
        
        $results=Product::where('statut','sales');//on récupère tous les produits soldés et on les stock dans results pour les compter
        $counts=$results->count();
        return view('solde',['products'=>$products],compact('products','counts'));
    }

    public function homme(){

        $products = Product::where('categorie_id','1')->paginate(6); //on affiche tous les produits dont categorie_id est '1' qui correspond à la catégorie homme avec un affichage de 6 produits par page et pagination

        $results=Product::where('categorie_id','1');//on récupère tous les produits de catégorie homme et on les stock dans results pour les compter
        $counts=$results->count();
        return view('homme',['products'=>$products],compact('products','counts'));
    }

    public function femme(){
        $products = Product::where('categorie_id','2')->paginate(6); //on affiche tous les produits dont categorie_id est '2' qui correspond à la catégorie femme avec un affichage de 6 produits par page et pagination

        $results=Product::where('categorie_id','2');//on récupère tous les produits de catégorie femme et on les stock dans results pour les compter
        $counts=$results->count();
        return view('femme',['products'=>$products],compact('products','counts'));
    }

    
    public function ficheProduct($id){
        $products = Product::find($id);// on affiche tous les details d'un produit côté client
        return view('ficheProduct',compact('products'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Product::paginate(15);//on affiche tous les produits de la table product dans la liste des produits côté admin avec un affichage de 15 produits par page et pagination
        
        return view('admin',compact('produits'));
    }

     public function categorie()
    {
        $categories = Category::paginate(6);//on affiche toutes les catégories de la table Category avec un affichage de 6 catégories par page et pagination
        return view('categorie',compact('categories'));
    }

    public function createProduct()
    {
        return view('createProduct');
    }

    public function createCategorie()
    {
        return view('createCategorie');
    }

    public function validateProduct(Request $request)
    {
        
     

         $addProduct= new Product;//On créé un nouveau objet produit
         
         //On récupère les differentes valeurs remplies aux champs du formulaire d'ajout d'un nouveau produit pour les insérer dans la base de données
         $addProduct->name=$request->input('name');
          $addProduct->description=$request->input('description');
          $addProduct->price=$request->input('price');

          $addProduct->size=$request->input('size');
          $addProduct->is_visible=$request->input('is_visible');
          $addProduct->reference=$request->input('reference');
          $addProduct->categorie_id=$request->input('categorie_id');

          $addProduct->statut=$request->input('statut');

          $addProduct->categorie_id=$request->input('categorie_id');


     if ($request->hasfile('picture')){

            $file = $request->file('picture'); 

            $filename = time() . '.' . $file->getClientOriginalExtension();
            
                //Condition pour stock la photo d'un nouveau produit dans le dossier correspondant à sa catégorie
             if(($addProduct->categorie_id==1)){
             
                  $file->move('images/hommes',$filename);

                }elseif(($addProduct->categorie_id==2)){

                 $file->move('images/femmes',$filename);
                }
          
                $addProduct->picture=$filename;
     }

                //enregistrement du nouveau produit
                $addProduct->save();
    

     //message de succes
     return redirect('/admin')->with('success','Sauvegarde réussie avec succés!');
    }
        public function validateCategorie(Request $request){
     

         $addCategorie= new Category;//on créé un nouveau objet catégorie
         
         $addCategorie->name=$request->input('name');//on récupère le nom de la nouvelle catégorie créée


         //enregistrement de la catégorie
         $addCategorie->save();

         //msg de succes
         return redirect('/categorie')->with('success','Sauvegarde réussie avec succés!');
     }


     public function updateCategorie($id){

        $categories = Category::find($id);
        return view('updateCategorie',compact('categories'));
    }

   
    public function editcategorie(Request $request ,$id){
        $this->validate($request,[
            'name'=>'required'
        ]);

        $data  = array('name' => $request->input('name'));
        
        Category::where('id',$id)->update($data);
        return redirect('/categorie')->with('info','Categorie update avec succes!');
    }


    public function deleteCategorie($id){
        
        Category::where('id',$id)->delete();
        return redirect('/categorie')->with('info','Categorie supprimer avec succes!');
    }

     public function updateProductView($id){//on affiche les details d'un produit côté client

        $products = Product::find($id);
        return view('updateProductView',compact('products'));
    }

    public function updateProduct($id){//on fait un update de la table produit côté Admin

        $products = Product::find($id);
        $categories =Category::find($id);

        return view('/updateProduct',compact('products','categories'));
    }


    public function editProduct(Request $request ,$id){

          $products = Product::find($id);
          
          $products->name=$request->input('name');
          $products->description=$request->input('description');
         

          $products->price=$request->input('price');
          $products->statut=$request->input('statut');
          $products->categorie_id=$request->input('categorie_id');
        
          $products->save(); 
       
    
        return redirect('/admin')->with('info','produit modifié avec succes!');
    }
 
    public function DeleteProduct($id){//on supprime un produit côté Admin

        Product::where('id',$id)->delete();
        return redirect('/admin')->with('info','produit supprimer avec succes!');
    }

}

