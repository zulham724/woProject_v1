@extends(Auth::user()->role_id==1 ? 'layouts.admin-horizontal' : 'layouts.operator-horizontal')
@section('css')

@endsection
@section('content')
<div class="container">

	<a href="{{(Auth::user()->role_id == 1) ? url('admin/order') : url('operator/order')}}"><button type="button" class="btn btn-success" name="button">Back</button></a><hr>

	<div class="panel panel-default">
		<div class="panel-heading">
			Form Pemesanan
		</div>
		<div class="panel-body">
			<form class="form" action="{{(Auth::user()->role_id == 1) ? url('admin/order/store') : url('operator/order/store')}}" enctype="multipart/form-data" method="post" files="true" id="orderForm">
			<div class="row">
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								Nota
							</div>
							<div class="panel-body">
								<div class="form-group">
									<h4><span class="label label-default">Nama Pemesan: </span></h4>
									<input type="text" name="nama_pemesan" class="form-control">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Email : </span></h4>
									<input type="text" name="email_pemesan" class="form-control">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Alamat: </span></h4>
									<input type="text" name="alamat_pemesan" class="form-control">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Kota: </span></h4>
									<input type="text" name="kota_pemesan" class="form-control">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">CP: </span></h4>
									<input type="text" name="cp_pemesan" class="form-control">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Tempat: </span></h4>
									<select class="form-control" name="tempat">
										<option value="Rumah">Rumah</option>
										<option value="Rumah-Gedung">Rumah-Gedung</option>
										<option value="Gedung">Gedung</option>
									</select>
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Penyelenggara:</span></h4>
									<select class="form-control" name="penyelenggara">
										<option value="Pihak Putra">Pihak Putra</option>
										<option value="Pihak Putri">Pihak Putri</option>
										<option value="Gabungan">Gabungan</option>
									</select>
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Jumlah Tamu Undangan: </span></h4>
									<input type="text" name="total_tamu" class="form-control">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Jenis Jamuan: </span></h4>
									<input type="text" name="jenis_jamuan" class="form-control">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">DP: </span></h4>
									<input type="text" name="dp" id="dp" class="form-control">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Upload: </span></h4>
									<input type="file" name="upload" id="upload">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">

						<div class="panel panel-default">
							<div class="panel-heading">
								Biodata
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">

										<div class="form-group">
											<h4><span class="label label-default">Nama Lengkap Pria: </span></h4>
											<input type="text" name="nama_lengkap_pria" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Alamat Pria: </span></h4>
											<input type="text" name="alamat_pria" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">CP Pria:</span></h4>
											<input type="text" name="cp_pria" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Tempat Tanggal Lahir:</span></h4>
											<input type="text" name="ttl_pria" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Agama Pria:</span></h4>
											<input type="text" name="agama_pria" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Pendidikan Pria</span></h4>
											<input type="text" name="pendidikan_pria" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Tinggi Badan Pria:</span></h4>
											<input type="text" name="tinggi_badan_pria" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Berat Badan Pria:</span></h4>
											<input type="text" name="berat_badan_pria" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Ayah:</span></h4>
											<input type="text" name="ayah_pria" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">CP Ayah:</span></h4>
											<input type="text" name="cp_ayah_pria" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Ibu:</span></h4>
											<input type="text" name="ibu_pria" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">CP Ibu:</span></h4>
											<input type="text" name="cp_ibu_pria" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Nama Kakak:</span></h4>
											<input type="text" name="nama_kakak_pria" class="form-control" id="tokenfield" data-role="tagsinput">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Nama Adik:</span></h4>
											<input type="text" name="nama_adik_pria" class="form-control" id="tokenfield" data-role="tagsinput">
										</div>

									</div>
									<div class="col-md-6">

										<div class="form-group">
											<h4><span class="label label-default">Nama Lengkap wanita: </span></h4>
											<input type="text" name="nama_lengkap_wanita" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Alamat wanita: </span></h4>
											<input type="text" name="alamat_wanita" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">CP wanita:</span></h4>
											<input type="text" name="cp_wanita" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Tempat Tanggal Lahir:</span></h4>
											<input type="text" name="ttl_wanita" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Agama wanita:</span></h4>
											<input type="text" name="agama_wanita" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Pendidikan wanita</span></h4>
											<input type="text" name="pendidikan_wanita" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Tinggi Badan wanita:</span></h4>
											<input type="text" name="tinggi_badan_wanita" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Berat Badan wanita:</span></h4>
											<input type="text" name="berat_badan_wanita" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Ayah:</span></h4>
											<input type="text" name="ayah_wanita" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">CP Ayah:</span></h4>
											<input type="text" name="cp_ayah_wanita" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Ibu:</span></h4>
											<input type="text" name="ibu_wanita" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">CP Ibu:</span></h4>
											<input type="text" name="cp_ibu_wanita" class="form-control">
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Nama Kakak:</span></h4>
											<input type="text" name="nama_kakak_wanita" class="form-control" id="tokenfield" data-role="tagsinput" >
										</div>
										<div class="form-group">
											<h4><span class="label label-default">Nama Adik:</span></h4>
											<input type="text" name="nama_adik_wanita" class="form-control" id="tokenfield" data-role="tagsinput">
										</div>


									</div>
								</div>
								{{-- end row --}}
							</div>
						</div>

					</div>
				{{-- end form --}}
			</div>
			{{-- end row --}}

			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									Pesanan
									<button type="button" class="btn btn-info pull-right" onclick="addItem();">Add Item</button>
									<div id="removeItem" class="pull-right"></div>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<div class="row">
											<div class="col-md-8">
												<input type="text" name="item0" class="form-control" placeholder="Nama Barang">
											</div>
											<div class="col-md-4">
												<input type="number" name="cost0" class="form-control" placeholder="harga">
											</div>
										</div>
									</div>
									<div id="contentItem"></div>
								</div>
							</div>
						</div>
					</div>
					{{-- end row --}}
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									Acara
									<button type="button" class="btn btn-info pull-right" onclick="addAcara();">Add Acara</button>
									<div id="removeAcara" class="pull-right"></div>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<div class="row">
											<div class="col-md-4">
												<input type="text" name="acara0" class="form-control" placeholder="Acara Pelaksanaan">
											</div>
											<div class="col-md-3">
												<input type="text" name="tanggal0" class="datepicker form-control" required placeholder="Tanggal" id="tanggal" readonly>
											</div>
											<div class="col-md-2">
												<input type="text" name="jam0" class="form-control" placeholder="Jam">
											</div>
											<div class="col-md-3">
												<input type="text" name="tempat0" class="form-control" placeholder="Tempat">
											</div>
										</div>
									</div>
									<div id="contentAcara"></div>
								</div>
							</div>
						</div>
					</div>
					{{-- end row --}}
				</div>
			</div>
			{{-- end row --}}

			<input type="hidden" name="totalItem" id="totalItem">
			<input type="hidden" name="totalAcara" id="totalAcara">
			{{csrf_field()}}
			<button type="submit" class="btn btn-success center-block btn-block">Submit</button>
			</form>
		</div>
	</div>
	{{-- end main panel --}}

</div>
{{-- end container --}}
@endsection
@section('script')
<script type="text/javascript">
var i = 0; //untuk total item
var a = 0; //untuk total acara
function datepicker(){
	$('.datepicker').datepicker({
      language: 'id',
      format:'yyyy-mm-dd'
    });
}
$(document).ready(function(){
	$('#tokenfield').tagsinput('items');
	datepicker();
	// $("#orderForm").validate({
	// 	rules:{
	// 		upload:{
	// 			required:true
	// 		}
	// 	}
	// });
	$("#orderForm").validate({
		rules:{
			dp:{
				required:true,
				digits: true
			}
		}
	});
});
function addItem(){
	i+=1;
	if(i>=0){
		$("#removeItem").html("<button class='btn btn-danger' type=button onclick='removeItem();'>Remove</button>")
	}
	$("#contentItem").append(
		"\
		<div class='form-group' id='item"+i+"'>\
			<div class='row'>\
				<div class='col-md-8'>\
					<input type='text' name='item"+i+"' class='form-control' placeholder='Nama Barang'>\
				</div>\
				<div class='col-md-4'>\
					<input type='number' name='cost"+i+"' class='form-control' placeholder='harga'>\
				</div>\
			</div>\
		</div>\
		");
	$("#totalItem").val(i);
	console.log($("#totalItem").val());
	console.log('item added',i);
	// $("#contentItem").append("")

}
function removeItem(){
	$("#item"+i).remove();
	i-=1;
	if(i==0){
		$("#removeItem").html("");
	}
	$("#totalItem").val(i);
	console.log($("#totalItem").val());
	console.log("item removed",i);
}
function addAcara(){
	a+=1;
	if(a>=0){
		$("#removeAcara").html("<button class='btn btn-danger' type=button onclick='removeAcara();'>Remove</button>")
	}
	$("#contentAcara").append(
		"\
		<div class='form-group' id='acara"+a+"'>\
			<div class='row'>\
				<div class='col-md-4'>\
					<input type='text' name='acara"+a+"' class='form-control' placeholder='Acara Pelaksanaan'>\
				</div>\
				<div class='col-md-3'>\
					<input type='text' name='tanggal"+a+"' class='datepicker form-control' placeholder='Tanggal' required readonly>\
				</div>\
				<div class='col-md-2'>\
					<input type='text' name='jam"+a+"' class='form-control' placeholder='Jam'>\
				</div>\
				<div class='col-md-3'>\
					<input type='text' name='tempat"+a+"' class='form-control' placeholder='Tempat'>\
				</div>\
			</div>\
		</div>\
		");
	$("#totalAcara").val(a);
	console.log($("#totalAcara").val());
	console.log('Acara added',a);
	// $("#contentItem").append("")
	datepicker();
}
function removeAcara(){
	$("#acara"+a).remove();
	a-=1;
	if(a==0){
		$("#removeAcara").html("");
	}
	$("#totalAcara").val(a);
	console.log($("#totalAcara").val());
	console.log("Acara removed",a);
}
</script>
@endsection
