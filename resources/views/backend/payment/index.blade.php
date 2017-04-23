@extends('layouts.app')



@section('contentheader_title')
	Payment
@endsection

@section('main-content')
	
 <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Payment for </h3>
        <!-- form start -->
        <form role="form" action="{{ route('backend.payment.store') }}" method="post">
            <div class="box-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="car_id" value="{{$carId}}">
                <input type="hidden" name="bidding_id" value="{{$payment->id}}">

                    <div class="form-group">
                        <label for="fees">Fees</label>
                        <p class="lead">${{$payment->bidprice}}</p>
                    </div>

                    <div class="form-group">
                        <label for="name">Bank account</label>
                      
                        <input type="text" name="bankaccount" class="form-control" id="name" placeholder="Enter Bank Account">
                    </div>



             


                
                   
                    
               

                 


                   {{--  </div>/.box-body --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a  class="btn btn-default">Cancel</a>
                    </div>
            </div>
        </form>
    </div>
</div>
@endsection
