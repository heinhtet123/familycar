@extends('layouts.app')



@section('contentheader_title')
	Cars
@endsection

@section('main-content')
	<div class="row">
            <div class="col-xs-12">
                <div class="box box-default">
                    
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                       <div class="row">
                            <div class="col-sm-12">
                                @if (Session::has('create_message'))
                                    <div class="alert alert-success alert-dismissible">
                                        {{ Session::get('create_message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    </div>
                                @elseif (Session::has('delete_message'))
                                	 <div class="alert alert-danger alert-dismissible">
                                        {{ Session::get('delete_message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    </div>
                            	@endif
                            </div>
                        </div>

                        <div class="row">
                        	<div class="col-sm-12">

                       				<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                            	<th rowspan="1" colspan="1">Index</th>
                                            	<th rowspan="1" colspan="1">Model Name</th>

                                                <th rowspan="1" colspan="1">Owner Name</th>
                                                

                                                <th rowspan="1" colspan="1">Action</th>

                                            </tr>
                                        </thead>

                                       
                                        
                                        <tbody>
                                        	
                                              @foreach($cars as $car)

                                                    <td>{{  $car->id }}</td>
                                                    
                                                    <td>{{$car->model->name}}</td>
                                                    
                                                    <td>{{$car->user->name}}</td>
                                                    <td>    
                                                       
                                                        </br>
                                                        
                                                        <form action="{{ route('backend.brand.destroy',['id'=>$car->id]) }}" method="POST">  
                                                        
                                                            <button class="form-control btn btn-danger">
                                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                            </button>

                                                                {{ csrf_field() }}
                                                                
                                                                {{ method_field('DELETE') }}
                                                        </form>   

                                                    </td> 
                                                    
                                                    
                                                </tr>
                                             @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                          

                        </div>
                    </div>

                    <div class="row">
                            <div class="col-sm-5">
                                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                    
                                </div>
                            </div>
                    </div>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
@endsection
