@extends('layouts.app')
@section('brand')
<a class="navbar-brand" style="color: #66EB9A" href="{{ url('/') }}" >
	WeFashion
</a>
@endsection
@section('navbar-admin')
<li> <a href="{{url('/solde')}}">SOLDE</a> </li>
<li> <a href="{{url('/homme')}}">HOMME</a> </li>
<li> <a href="{{url('/femme')}}">FEMME</a> </li>
@endsection
@section('content')
<div class="container">
	<div class="row">
		
		<div class="col-md-3 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					
					@if ($products->categorie_id === 1)
					<img class="card-img-top" width="230" height="350" src="{{asset('/images/hommes/'.$products->picture)}}" alt="{{$products->name}}">
					@else
					<img class="card-img-top" width="230" height="350" src="{{asset('/images/femmes/'.$products->picture)}}" alt="{{$products->name}}">
					@endif
				</div>
			</div>
			Description :<small><cite title="Source Description"><br> {{$products->description}}</cite></small>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
					Nom:<small> {{$products->name}} <cite title="Source Title"></cite></small><br>
					Prix : <small>{{$products->price}}<cite title="Source Price"> </cite></small><br>
					Reference : <small>{{$products->reference}} <cite title="Source Reference"></cite></small><br>
					Statut : <small>{{$products->statut}}<cite title="Source Statut"> </cite></small><br>
					categorie : <small>{{$products->categorie->name}} <cite title="Source Category"><br></cite></small><br>
					<form method="post">
						<div> <p> Taille :</p></div>
						<select class="form-control">
							<option>{{$products->size}}</option>
						</select><br>
						<!-- <a href="#" class="btn btn-primary col-md-offset-9">Acheter</a> -->
						<a href="#"><button class="btn btn-success col-md-offset-9" role="button" >Acheter</button></a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection