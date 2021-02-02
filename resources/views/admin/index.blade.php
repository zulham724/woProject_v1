@extends('layouts.admin-horizontal')
@section('staff-active','class=menu-top-active')
@section('css')

@endsection
@section('content')
	<div class="container">
	<a href="{{url('admin/staff/create')}}"><button type="button" class="btn btn-success">Insert new Staff</button></a><hr>

	<div class="panel panel-default">
		<div class="panel-heading">
			Staff List
		</div>
		{{-- end heading --}}
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $index => $ini)
						<tr>
							<th>{{$index+1}}</th>
							<th>{{$ini->name}}</th>
							<th>{{$ini->email}}</th>
							<th>{{$ini->content}}</th>
							<th>
								<button type="button" class="btn btn-warning" onclick="event.preventDefault();document.getElementById('edit{{$ini->id}}').submit();">Edit</button>
								<button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete{{$ini->id}}').submit();">Delete</button>
								<form id="edit{{$ini->id}}" action="{{url('admin/staff/edit')}}" method="post">
									<input type="hidden" name="id" value="{{$ini->id}}">
									{{csrf_field()}}
								</form>
								<form id="delete{{$ini->id}}" action="{{url('admin/staff/delete')}}" method="post">
									<input type="hidden" name="id" value="{{$ini->id}}">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
								</form>

							</th>
						</tr>
						@endforeach
					</tbody>
				</table>		
			</div>
		</div>
		{{-- end body --}}
	</div>

	</div>
	{{-- end container --}}
@endsection
@section('script')
<script type="text/javascript">

$(document).ready(function(){

$("table").DataTable();

});
// end ready
</script>
@endsection
