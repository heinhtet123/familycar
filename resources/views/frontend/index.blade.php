@extends('frontend.layout.master')

@section('main-content')

<div class="main-content">
	<div class="wrap">
		<div class="main-box">
		   <div class="box_wrapper"><h1>Featured Cars</h1></div>

		   <?php $key=0;?>
		   @foreach ($cars as $car)
					<?php $date = DateTime::createFromFormat("Y-m-d", $car->model->year); ?>

					@if (($key+1)%4==0 && $key!==0)
						

						<div class="col_1_of_4 span_1_of_4">
								<img src="{{asset('img/pic2.jpg') }}" alt=""/>
								<div class="grid_desc"> 
									<p class="title">Car Model : {{ $car->model->name }}</p>
									<p class="title1">Brand : {{ $car->model->brand->name}}
									</p>
									<p class="title1">Year : {{ $date->format("Y")}}
									</p>

									<div class="price1" style="height: 19px;">
										<span class="reducedfrom">${{$car->floor_price}}</span>
									</div>
									<div class="Details">
				     					<a href="{{url('frontend/tobid',[$car->id])}}" title="To Bidding Details Page" class="button">To Bidding<span></span></a>
				     				</div>
								</div>	
						</div>
						<div class="clear"></div>
						<!-- end of section -->
						</div>
						<?php  $key=0;?>
					 @elseif($key==0)
						<div class="section group">
							<div class="col_1_of_4 span_1_of_4">
								<img src="{{asset('img/pic2.jpg') }}" alt=""/>
								<div class="grid_desc"> 
									<p class="title">Car Model : {{ $car->model->name }}</p>
									<p class="title1">Brand : {{ $car->model->brand->name}}
									</p>
									<p class="title1">Year : {{ $date->format("Y")}}
									</p>

									<div class="price1" style="height: 19px;">
										<span class="reducedfrom">${{$car->floor_price}}</span>
									</div>
									<div class="Details">
				     					<a href="{{url('frontend/tobid',[$car->id])}}" title="To Bidding Details Page" class="button">To Bidding<span></span></a>
				     				</div>
								</div>	
							</div>	
							<?php $key++; ?>
					@else
						<div class="col_1_of_4 span_1_of_4">
								<img src="{{asset('img/pic2.jpg') }}" alt=""/>
								<div class="grid_desc"> 
									<p class="title">Car Model : {{ $car->model->name }}</p>
									<p class="title1">Brand : {{ $car->model->brand->name}}
									</p>
									<p class="title1">Year : {{ $date->format("Y")}}
									</p>

									<div class="price1" style="height: 19px;">
										<span class="reducedfrom">${{$car->floor_price}}</span>
										<span class="actual">$12.00</span>
									</div>
									<div class="Details">
				     					<a href="{{url('frontend/tobid',[$car->id])}}" title="To Bidding Details Page" class="button">To Bidding<span></span></a>
				     				</div>
								</div>	
							</div>
							<?php $key++; ?>	
					@endif

					
			@endforeach
			<div class="row" align="center">
				{{$cars->render()}}
			</div>
			

		</div>
	</div>
</div>

@endsection