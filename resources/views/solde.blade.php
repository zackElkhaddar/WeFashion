@extends('layouts.app')
@section('brand')
<a class="navbar-brand" style="color: #66EB9A" href="{{ url('/') }}" >
	WeFashion
</a>
@endsection
@section('navbar-admin')
<li class="active"> <a href="{{url('/solde')}}">SOLDE</a> </li>
<li> <a href="{{url('/homme')}}">HOMME</a> </li>
<li> <a href="{{url('/femme')}}">FEMME</a> </li>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div>
			<h4 class="d-flex justify-content-between align-items-center mb-3" style="margin-left: 1050px">
			<span class="text-muted"></span>
			<span class="badge badge-secondary badge-pill">{{$counts}} {{'produit(s)'}}</span></h4></div>
			@if(count($products) > 0)
			@foreach($products->all() as $product)
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<a style="text-decoration: none;" href='{{ url("/ficheProduct/{$product->id}")}}'>
							@if ($product->categorie_id === 1)
							<img class="card-img-top" width="230" height="350" src="{{asset('/images/hommes/'.$product->picture)}}" alt="{{$product->name}}">
							@else
							<img class="card-img-top" width="230" height="350" src="{{asset('/images/femmes/'.$product->picture)}}" alt="{{$product->name}}">
							@endif<br>
							<small>Name: {{$product->name}} <cite title="Source Title"><br>Price-> {{$product->price}}</cite></small>
						</a>
					</div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
		{{$products->links()}}
	</div>
	@endsection