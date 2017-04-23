@extends('layouts.app')

@section('contentheader_title')
    Reports
@endsection


@section('main-content')
	<div class="container spark-screen">
		<!-- Most Buying customer -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-4">
				<div class="box box-widget widget-user-2">
					<div class="widget-user-header bg-yellow">
						 <h3 class="widget-user-username">Loyal Customer</h3>
              			 <h5 class="widget-user-desc">All Time</h5>
					</div>
					<div class="box-footer no-padding">
			              <ul class="nav nav-stacked">
				              @foreach($mostPaidUsers as $user)
				               <li><a href="#">{{ $user->user->name}} <span class="pull-right badge bg-blue">{{$user->usercount}}</span></a></li>
				              @endforeach
			              </ul>
            		</div>
					
				</div>
			</div>
			<div class="col-md-6">
					<div class="box box-danger">
			            <div class="box-header with-border">
			              <h3 class="box-title">Most Popular Sold Car Brand</h3>

			              <div class="box-tools pull-right">
			                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
			                </button>
			                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			              </div>
			            </div>

			            <div class="box-body chart-responsive">
			              <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
			            </div>
	            <!-- /.box-body -->
	          		</div>
			</div>
		</div>

		<div class="row">
				<div class="col-md-10">
					<div class="box box-info">
			            <div class="box-header with-border">
			              <h3 class="box-title">Car Sale Report Monthly for (2017)</h3>

			              <div class="box-tools pull-right">
			                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
			                </button>
			                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			              </div>
			            </div>
			            <div class="box-body">
			              <div class="chart">
			                <canvas id="lineChart" style="height:250px"></canvas>
			              </div>
			            </div>
			            <!-- /.box-body -->
			          </div>
						
				</div>
		</div>



	</div>
@endsection

@section('js')
<script>
	$(function () {
	"use strict";

	let mostbrandpost_url="{{ url('backend/mostbrand') }}";
	let monthlysalepost_url="{{ url('backend/monthlysale') }}";
	$.ajax({
            url:mostbrandpost_url,
            type:"POST",
            headers:{'X-CSRF-Token':$('input[name=_token]').val()},
            data: {roomtype:$(this).val()},
            cache: false,           // To unable request pages to be cached
            success:function(data)
            {
            	let inner_data=[];
            	$.each(data, function( index, val ) {
  					inner_data.push({label:index,value:val});
				});

            	let donut = new Morris.Donut({
			      element: 'sales-chart',
			      resize: true,
			      colors: ["#3c8dbc", "#f56954", "#00a65a"],
			      data: inner_data,
			      hideHover: 'auto'
			    });
            }
    });
////////////////////////////////////////////////////////////////////////////////
	
	$.ajax({
            url:monthlysalepost_url,
            type:"POST",
            headers:{'X-CSRF-Token':$('input[name=_token]').val()},
            data: {roomtype:$(this).val()},
            cache: false,           // To unable request pages to be cached
            success:function(datas)
            {
            	let areaChartData = {
			      labels: ["January", "February", "March", "April", "May", "June", "July"],
			      datasets: [
			        {
			          label: "Electronics",
			          fillColor: "rgba(210, 214, 222, 1)",
			          strokeColor: "rgba(210, 214, 222, 1)",
			          pointColor: "rgba(210, 214, 222, 1)",
			          pointStrokeColor: "#c1c7d1",
			          pointHighlightFill: "#fff",
			          pointHighlightStroke: "rgba(220,220,220,1)",
			          data: datas
			        }
			      ]
			    };

			    let areaChartOptions = {
			      //Boolean - If we should show the scale at all
			      showScale: true,
			      //Boolean - Whether grid lines are shown across the chart
			      scaleShowGridLines: false,
			      //String - Colour of the grid lines
			      scaleGridLineColor: "rgba(0,0,0,.05)",
			      //Number - Width of the grid lines
			      scaleGridLineWidth: 1,
			      //Boolean - Whether to show horizontal lines (except X axis)
			      scaleShowHorizontalLines: true,
			      //Boolean - Whether to show vertical lines (except Y axis)
			      scaleShowVerticalLines: true,
			      //Boolean - Whether the line is curved between points
			      bezierCurve: true,
			      //Number - Tension of the bezier curve between points
			      bezierCurveTension: 0.3,
			      //Boolean - Whether to show a dot for each point
			      pointDot: false,
			      //Number - Radius of each point dot in pixels
			      pointDotRadius: 4,
			      //Number - Pixel width of point dot stroke
			      pointDotStrokeWidth: 1,
			      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
			      pointHitDetectionRadius: 20,
			      //Boolean - Whether to show a stroke for datasets
			      datasetStroke: true,
			      //Number - Pixel width of dataset stroke
			      datasetStrokeWidth: 2,
			      //Boolean - Whether to fill the dataset with a color
			      datasetFill: true,
			      //String - A legend template
			      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
			      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
			      maintainAspectRatio: true,
			      //Boolean - whether to make the chart responsive to window resizing
			      responsive: true
			    };
	
			    let lineChartCanvas = $("#lineChart").get(0).getContext("2d");
			    let lineChart = new Chart(lineChartCanvas);
			    let lineChartOptions = areaChartOptions;
			    lineChartOptions.datasetFill = false;
			    lineChart.Line(areaChartData, lineChartOptions);


            }



          });

////////////////////////////////////////////////////////////////////////////////////	











	});
</script>
@endsection