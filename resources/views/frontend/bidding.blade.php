@extends('frontend.layout.master')

@section('main-content')

<div class="container text-center">    
	<h3>{{$car->model->name}} ({{$car->model->brand->name}})</h3><br>
	<div class="row">
		<div class="col-sm-12">
			@if (Session::has('lessprice'))
                <div class="alert alert-danger alert-dismissible">
                    {{ Session::get('lessprice') }}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
            @endif
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">

		</div>
		<div class="col-sm-5"> 
			<div class="row">
				<div class="col-md-1 text-center">
					<h5>Floor Price</h5>
				</div>
				<div class="col-md-11">
					<h4>$ {{ $car->floor_price }} </h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1 text-center">
					<h5>Time Left</h5>
				</div>
				<div class="col-md-11">
					<h4><small>{{$timeDiff}}</small></h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1 text-center">
					<h5>Transmission</h5>
				</div>
				<div class="col-md-11">
					<h4><small>{{$car->transmission}}</small></h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1 text-center">
					<h5>Color</h5>
				</div>
				<div class="col-md-11">
					<h5 style="background-color:{{$car->color}}">&nbsp&nbsp</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1 text-center">
					<h5>Cylinders</h5>
				</div>
				<div class="col-md-11">
					<h5 >{{$car->numberof_cylinders}}</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1 text-center">
					<h5>Fuel Type</h5>
				</div>
				<div class="col-md-11">
					<h5 >{{$car->fuel_type}}</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1 text-center">
					<h5>Engine</h5>
				</div>
				<div class="col-md-11">
					<h5 >{{$car->engine}}</h5>
				</div>
			</div>

			<div class="well">	
				<form class="form-horizontal" action="{{ route('frontend.placeBid') }}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="car_id" value="{{$car->id}}">
					<div class="form-group">

					<label class="control-label col-sm-5" for="email">Current bid:</label>

						<div class="col-sm-7">US ${{$maxprice}}
							<input type="text" class="form-control" id="bidprice" placeholder="Enter Bidding price" name="bidprice">
						
						</div>
					</div>
					<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Place bid</button>
						</div>
					</div>		
				</form>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="well">
				<p>Seller Information</p>
				<p>Name: {{$car->user->name}}</p>
				<p>Email: {{$car->user->email}}</p>
				<p>Phone Number: {{$car->user->phonenumber}}</p>

			</div>		
		</div>

	</div>
</div><br>


@endsection