@extends('layouts.app')
@section('brand')
<span class="navbar-brand" style="color: #66EB9A">
  WeFashion
</span>
@endsection
@section('navbar-admin')
<li><a href="{{ url('/admin') }}">Produits</a></li>
<li class="active"><a href="{{ url('categorie') }}">Catégories</a></li>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Ajouter une catégorie</div>
        <div class="panel-body">
          <!-- <div>
            <a style="margin: 19px;" href="" class="btn btn-primary">Nouveau produit</a>
          </div> -->
          <div class="col-sm-8 offset-sm-2">
            <!-- <h1 class="display-3">Ajouter un produit</h1> -->
            <div>
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div><br />
              @endif
              <form method="post" action="{{ route('validateCategorie') }}" enctype="multipart/form-data">
                {{csrf_field()}}
                <label for="name" class="col-lg-4 control-label">Nom catégorie: </label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="name" name="name" value="" placeholder="Entrez un nom de catégorie">
                </div><br>
                <button type="submit" class="btn btn-success col-lg-2 control-btn">Ajouter</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection