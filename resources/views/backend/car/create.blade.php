 @extends('layouts.app')



@section('contentheader_title')
    Car
@endsection

@section('main-content')
 
 <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Register A Car </h3>
        
        <!-- form start -->
        <form role="form" action="{{ route('backend.car.carpayment') }}" method="get">
            <div class="box-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 
                 <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i><a href="">Car Register</a></li>
                    <li><a href="">Car Registration Payment</a></li>
                 </ol>

                <div class="form-group">
                    <label for="name">Car Models</label>
                    
                   
                    <select name="model_id" class="form-control">
                        @foreach($models as $model)
                            <option selected="selected" hidden>Please select An Option</option>
                            <optgroup label="{{$model->brand->name}}">

                                <option value="{{$model->id}}">&nbsp&nbsp{{$model->name}}</option>
                            </optgroup>
                        @endforeach
                    </select>
                </div>

              

                    @if($errors->has('color'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="color"><i class="fa fa-times-circle-o"></i> {{ $errors->first('color') }}</label>
                        @else
                    <div class="form-group">
                        <label for="color">Color</label>
                        @endif
                        <input type="color" name="color" class="form-control" id="color" placeholder="Enter Brand Name">
                    </div>

                     @if($errors->has('transmission'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="transmission"><i class="fa fa-times-circle-o"></i> {{ $errors->first('transmission') }}</label>
                        @else
                    <div class="form-group">
                        <label for="transmission">Transmission</label>
                        @endif
                        <input type="range" name="transmission" class="form-control" id="transmission" min="1" max="8" step="1"><label id="transmission_display" ></label>
                    </div>
                    

                    @if($errors->has('numberof_cylinders'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="name"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</label>
                        @else
                    <div class="form-group">
                        <label for="name">Cylinders</label>
                        @endif
                        <input type="number" name="numberof_cylinders" class="form-control" id="name" min="0" max="12">
                    </div>


                    <div class="form-group">
                       <label for="name">Fuel</label>
                       
                        <select name="fuel_type" class="form-control">
                             <option value="Gas">Gas</option>
                             <option value="Disel">Disel</option>
                        </select>
                        
                    </div>                
                   
                    
               
                    <div class="form-group">
                       <label for="engine">Engine</label>
                        <input type="text" name="engine" class="form-control">
                        
                    </div>    
                 
                    <div class="form-group">
                       <label for="engine">FloorPrice</label>
                        <input type="text" name="floor_price" class="form-control">
                        
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