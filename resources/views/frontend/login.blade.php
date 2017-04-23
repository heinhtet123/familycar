@extends('frontend.layout.master')

@section('main-content')


<div class="wrapper">
    <form class="form-signin" method="post">       
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" /><br/>
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
    </form>
  </div>

@endsection

@section("css")
<style>


.wrapper {	
	margin-top: 80px;
  margin-bottom: 80px;
}


.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  
}

 .form-signin-heading,
  .checkbox {
	  margin-bottom: 30px;
	}

	.checkbox {
	  font-weight: normal;
	}

	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
	
	}

	input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}

 
</style>
@endsection