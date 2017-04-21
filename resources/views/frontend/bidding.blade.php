@extends('frontend.layout.master')

@section('main-content')

<div class="container text-center">    
	<h3>What We Do</h3><br>
	<div class="row">
		<div class="col-sm-4">
			<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">

		</div>
		<div class="col-sm-5"> 
			<div class="row">
				<div class="col-md-1 text-center">
					<h5>hello</h5>
				</div>
				<div class="col-md-11">
					<h4>Anja <small>Sep 29, 2015, 9:12 PM</small></h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1 text-center">
					<h5>hello</h5>
				</div>
				<div class="col-md-11">
					<h4>Anja <small>Sep 29, 2015, 9:12 PM</small></h4>
				</div>
			</div>
			<div class="well">	
				<form class="form-horizontal">
					<div class="form-group">
					<label class="control-label col-sm-5" for="email">Current bid:</label>
						<div class="col-sm-7">US $1,380.00
							<input type="email" class="form-control" id="email" placeholder="Enter email">
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
				<p>Some text..</p>
			</div>
			<div class="well">
				<p>Some text..</p>
			</div>
		</div>
	</div>
</div><br>


@endsection