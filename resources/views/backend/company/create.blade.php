 @extends('layouts.app')



@section('contentheader_title')
    Company
@endsection

@section('main-content')

 <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Create A Brand</h3>
        <!-- form start -->
        <form role="form" action="{{ route('backend.company.store') }}" method="post">
            <div class="box-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                @if($errors->has('name'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="name"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</label>
                        @else
                    <div class="form-group">
                        <label for="name">Car Company Name</label>
                        @endif
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Brand Name">
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