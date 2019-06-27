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
        <div class="panel-heading">Modification d'une catégorie</div>
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
              <form class="form-horizontal" method="POST" action="{{url('/editcategorie',$categories->id)}}">
                
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
                  <!-- <legend>We fashion</legend> -->
                  <div class="form-group">
                    <label for="categorie" class="col-lg-2 control-label">Categorie:</label>
                    <div class="col-lg-4">
                      <input type="text" class="form-control" id="name" name="name" value="{{$categories->name}}"placeholder="title"><br>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-offset-4 ">
                      <button type="submit" name="submit" class="btn btn-success">Modifier</button>
                      <a href="{{ url('/categorie') }}" class="btn btn-warning">Retour</a>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection