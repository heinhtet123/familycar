 @extends('layouts.app')



@section('contentheader_title')
    Car
@endsection

@section('main-content')
 <div class="box box-danger">
        <div class="box-header with-border"> 
            <h3 class="box-title">Payment</h3>
        
        <!-- form start -->
        <form role="form" action="{{ route('backend.car.store') }}" method="post">
            <div class="box-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @foreach($values as $value)
                <input type="hidden" name="sval[]" value="{{$value}}">
                @endforeach
                
                 <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i><a href="">Car Register</a></li>
                    <li><a href="">Car Registration Payment</a></li>
                 </ol>

                <div class="form-group">
                    <label for="fees">Fees</label>
                    <p class="lead">$200</p>
                </div>
                
                <div class="form-group">
                    <label>Bank Account</label>

                     <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-bank"></i>
                            </div>
                             <input name="bankaccount" type="text"  class="form-control" id="bankaccount" autocomplete="off" required>
                    </div>
                    
                </div>
                    
                 


                   {{--  </div>/.box-body --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Pay</button>
                        <a  class="btn btn-default">Cancel</a>
                    </div>

            </div>
        </form>
    </div>
</div>
@endsection


@section("js")
<script>
"use strict";
    
    let hello=$("#transmission").val();
    $("#transmission_display").html(hello);

    $("#transmission").on("change",function(e){
        hello=$(this).val();
        $("#transmission_display").html(hello);
    });



</script>
@endsection