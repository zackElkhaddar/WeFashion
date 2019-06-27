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
    <div style="margin-left:950px;">
      <a style="margin: 19px;" href="{{route('createCategorie')}}" class="btn btn-primary">Nouveau</a>
    </div>
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Liste des catégories</div>
        <div class="panel-body">
          <div class="row">
            <!--
            <div class="row"> -->
              <div class="col-sm-12">
                @if(session()->get('success'))
                <div class="alert alert-success">
                  {{ session()->get('success') }}
                </div>
                @endif
              </div>
              <div class="col-sm-12">
                <!--   <h1 style="font-size:30px;"class="display-3">Catégorie</h1> -->
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <td>Id</td>
                      <td>Nom</td>
                      <td>Modifier</td>
                      <td colspan = 2>Supprimer</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $categorie)
                    <tr>
                      <td>{{$categorie->id}}</td>
                      <td>{{$categorie->name}}</td>
                      <!-- <td>
                        <a href="" class="btn btn-primary">Details</a>
                      </td> -->
                      <td>
                        <a href='{{url("/updateCategorie/{$categorie->id}")}}' class="btn btn-primary btn-circle btn-lg"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                      </td>
                      <td>
                        
                        
                        <a href='{{url("/deleteCategorie/{$categorie->id}")}}'><button onclick="return confirm('Etes-vous sûr de vouloir supprimer cette categorie?');" class="btn btn-danger btn-circle btn-lg" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
                        
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div>
                {{--pagination sous laravel--}}
                {{--$shops->links()--}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection