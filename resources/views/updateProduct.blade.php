@extends('layouts.app')
@section('brand')
<span class="navbar-brand" style="color: #66EB9A">
  WeFashion
</span>
@endsection
@section('navbar-admin')
<li  class="active"><a href="{{ url('/admin') }}">Produits</a></li>
<li><a href="{{ url('categorie') }}">Catégories</a></li>
@endsection
@section('content')
<div class="container">
  <div class="row">
    
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Modification d'un produit</div>
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
              <form class="form-horizontal" method="POST" action="{{ url('editProduct',$products->id) }}">
                
                {{csrf_field()}}
                <!--requet pour dire que tous les champs doivent etre rempli-->
                @if(count($errors ) > 0)
                @foreach($errors->all() as $error )
                <div class="alert alert-danger">
                  {{$error}}
                </div>
                @endforeach
                @endif
                <!--fin-->
                <fieldset>
                  
                  <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="name" name="name" value="{{ $products->name}}"placeholder="title">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description" class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" rows="3" name="description">{{ $products->description}}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="price" class="col-lg-2 control-label">Price</label>
                    <div class="col-lg-10">
                      <input type="number" class="form-control" id="price" name="price" min="0.00" max="1000.00" step="100.00" value="{{ $products->price}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="statut" class="col-lg-2 control-label">Statut</label>
                    <div class="col-lg-10">
                      <select id="statut" name="statut" >
                        <option value="sales"  @if($products->statut ==="sales") selected @endif>Sales</option>
                        <option value="standard" @if($products->statut ==="standard") selected @endif>Standard</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                  <label for="categorie" class="col-lg-2 control-label">Categorie</label>
                  <div class="col-lg-10">
                  <select id="categorie_id" name="categorie_id">
                    <option value="1">Hommes</option>
                    <option value="2">Femmes</option>
                  </select>
                </div>
                </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button type="submit" name="submit" class="btn btn-success active ">Modifier</button>
                      <a href="{{ url('/admin') }}" class="btn btn-warning">Retour</a>
                    </div>
                  </div>
                </fieldset>
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection