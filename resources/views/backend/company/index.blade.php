@extends('layouts.app')



@section('contentheader_title')
	Company
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
                                @if (Session::has('message'))
                                    <div class="alert alert-danger alert-dismissible">
                                        {{ Session::get('message') }}
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
                                                
                                                <th rowspan="1" colspan="1">Company Name</th>
                                                

                                                <th rowspan="1" colspan="1">Action</th>

                                            </tr>
                                        </thead>

                                       
                                        
                                        <tbody>
                                            @foreach($carcompany as $carcompany)

                                                    <td>{{  $carcompany->id }}</td>
                                                    
                                                    @if(!empty($carcompany->name))
                                                        <td>{{  $carcompany->name }}</td>
                                                    @endif

                                                    

                                                    <td>    
                                                       
                                                        </br>
                                                        
                                                        <form action="{{ route('backend.company.destroy',['id'=>$carcompany->id]) }}" method="POST">  
                                                        
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
