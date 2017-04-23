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
                                        	
                                              @foreach($bidWons as $bidwon)

                                                    <td>{{  $bidwon->id }}</td>
                                                    
                                                    <td>{{$bidwon->car->model->name}}</td>
                                                        
                                                    <td>{{$bidwon->user->name}}</td>

                                                    <td>
                                                        @if($bidwon->status==2)
                                                            <a href="{{url('backend/pay',['bidid'=>$bidwon->id])}}" class="btn btn-info">To Pay</a>
                                                        @else
                                                            <button class="btn  btn-success">Paid</button>
                                                        @endif
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
