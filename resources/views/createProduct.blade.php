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
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Ajouter un produit</div>
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
              <form method="post" action="{{ route('validateProduct') }}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="name">Nom:</label>
                  <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                  <label for="description">Description:</label>
                  <input type="text" class="form-control" name="description"/>
                </div>
                <div class="form-group">
                  <label for="price">Prix:</label>
                  <input type="number" class="form-control" id="price" name="price" min="0.00" max="1000.00" step="100.00"/>
                </div>
                <div class="form-group">
                  <label for="size">Taille:</label>
                  <select class="form-control" id="size" name='size'>
                    <option value="XS"selected>XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="is_visible">Statut:</label>
                  <select class="form-control" id="is_visible" name="is_visible">
                    <option value="1" selected>Publié</option>
                    <option value="0">Non publié</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="price">Etat:</label>
                  <select class="form-control" id="statut" name="statut">
                    <option value="standard" selected>Standard</option>
                    <option value="solde">Solde</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="categorie">Categorie:</label>
                  <select class="form-control" id="categorie_id" name="categorie_id">
                    <option value="1">Hommes</option>
                    <option value="2">Femmes</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="text">Reference:</label>
                  <input type="text" class="form-control" name="reference" placeholder="minimum 16 caractères requis" />
                </div>

                <div class="input-group">
                  <div class="custom-file form-control">
                    <input type="file" class="custom-file-input" name="picture" placeholder="picture">
                  </div>
                </div>
                <br>
                
                <button type="submit" class="btn btn-success active" role="button" aria-pressed="true">Ajouter un produit</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection