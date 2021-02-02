@extends('layouts.admin-horizontal')
@section('schedule-active','class=menu-top-active')
@section('css')

@endsection
@section('content')
<div class="container">
	<div id="calendar"></div>
</div>
{{-- every modal placed here --}}
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pesanan Acara</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
        	<thead>
        		<tr>
        			<td>No.</td>
        			<td>Acara</td>
        			<td>Tanggal</td>
							<td>Jam</td>
        			<td>Tempat</td>
        		</tr>
        	</thead>
        	<tbody id="contentAcara">

        	</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function() {

    // page is now ready, initialize the calendar...
    var data=[];
    $.each({!!$schedule!!},function(key,i){
    	data[key] = {title:this.nama_pemesan,start:this.tanggal,id:this.id};
    });
    console.log(data);
    $('#calendar').fullCalendar({
        lang:'id',
        events : data,
        eventClick:function(event){
        	if(event.id){
        		$("#contentAcara").html("");
        		$("#myModal").modal();
        		$("#content").text(event.id);
        		var acara = {!!$schedule!!}.filter(function(i){
        			return i.id == event.id;
        		});
        		console.log(acara);
        		$.each(acara,function(key,i){
        			key+=1;
        			$("#contentAcara").append("\
        				<tr>\
							<td>"+key+"</td>\
							<td>"+this.acara+"</td>\
							<td>"+this.tanggal+"</td>\
							<td>"+this.jam+"</td>\
							<td>"+this.tempat+"</td>\
						</tr>\
        				");
        		});
        	}
        }
    });

});
</script>
@endsection
