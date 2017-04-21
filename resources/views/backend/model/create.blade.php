 @extends('layouts.app')



@section('contentheader_title')
    Model
@endsection

@section('main-content')

 <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Create A Model</h3>
        <!-- form start -->
        <form role="form" action="{{ route('backend.model.store') }}" method="post">
            <div class="box-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div class="form-group">
                    <label for="name">Brand Name</label>
                    <select name="brand_id" class="form-control">

                        @foreach($brands as $key=>$brand)
                             <option value="{{ $key }}">{{ $brand }}
                             </option>
                        @endforeach
                    </select>
                </div>

                @if($errors->has('name'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="name"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</label>
                        @else
                    <div class="form-group">
                        <label for="name">Model Name</label>
                        @endif
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Model Name">
                    </div>



             
                     
                    @if($errors->has('year'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="year"><i class="fa fa-times-circle-o"></i> {{ $errors->first('year') }}</label>
                        @else
                    <div class="form-group">
                        <label for="year">Year</label>
                        @endif
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                             <input name="year" type="text" data-date-format="yyyy-mm-dd" class="form-control" id="year" autocomplete="off" required>
                        </div>
                       
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
    
    $('#year').datepicker({
         autoclose: true,
         minViewMode: 2
    });

</script>
@endsection