@extends('layouts.app')
@section('brand')
<span class="navbar-brand" style="color: #66EB9A">
                    WeFashion
                </span>
@endsection
@section('navbar-admin')
<li class="active"><a href="{{ url('/admin') }}">Produits</a></li>
                    <li><a href="{{ url('categorie') }}">Catégories</a></li>

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div style="margin-left:950px;">
    <a style="margin: 19px;" href="{{route('createProduct')}}" class="btn btn-primary">Nouveau</a>
   </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Liste des produits</div>

                <div class="panel-body">
                    <div class="row">

<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
</div>

<div class="col-sm-12">
    <!-- <h1>Product</h1> -->
  <table class="table table-striped">
    <thead>
        <tr>

          <td>Nom</td>
          <td>Categorie</td>
          <td>Prix</td>
          <td>Etat</td>
          <!-- <td>Categorie</td> -->

          <td>Modifier</td>
          <td colspan = 2>Supprimer</td>
        </tr>
    </thead>
    <tbody>
        @foreach($produits as $produit)
        <tr>

            <td>{{$produit->name}}</td>
            <td>{{$produit->categorie->name}}</td>
            <td>{{$produit->price}}</td>

            <td>{{$produit->statut}}</td>

            <td>
                <a href='{{url("/updateProduct/{$produit->id}")}}' class="btn btn-primary btn-circle btn-lg"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
            </td>
            <td>

               <a href='{{url("/DeleteProduct/{$produit->id}")}}'> <button onclick="return confirm('Etes-vous sûr de vouloir supprimer ce produit?');" class="btn btn-danger btn-circle btn-lg" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"> </span></button></a>
          
            </td>

        </tr>
        @endforeach
    </tbody>
  </table>

{{--pagination sous laravel--}}
  {{$produits->links()}}
                </div>
            </div>
        </div>
    </div>

</div>


<div>

</div>
@endsection
