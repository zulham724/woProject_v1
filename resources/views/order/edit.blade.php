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
			<form class="form" action="{{(Auth::user()->role_id == 1) ? url('admin/order/update') : url('operator/order/update')}}" enctype="multipart/form-data" method="post" files="true" id="orderForm">
			<div class="row">
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								Nota
							</div>
							<div class="panel-body">
								<div class="form-group">
									<span class="label label-default">Nama Pemesan: </span>
									<input type="text" name="nama_pemesan" class="form-control" value="{{$order->nama_pemesan}}">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Email : </span></h4>
									<input type="text" name="email_pemesan" value="{{$order->email_pemesan}}" class="form-control">
								</div>
								<div class="form-group">
									<span class="label label-default">Alamat: </span>
									<input type="text" name="alamat_pemesan" class="form-control" value="{{$order->alamat_pemesan}}">
								</div>
								<div class="form-group">
									<span class="label label-default">Kota: </span>
									<input type="text" name="kota_pemesan" class="form-control" value="{{$order->kota_pemesan}}">
								</div>
								<div class="form-group">
									<span class="label label-default">CP: </span>
									<input type="text" name="cp_pemesan" class="form-control" value="{{$order->cp_pemesan}}">
								</div>
								<div class="form-group">
									<span class="label label-default">Tempat: </span>
									<select class="form-control" name="tempat">
									    <option value="{{$order->pelaksanaan_acara}}">{{$order->pelaksanaan_acara}}</option>
										<option value="Rumah">Rumah</option>
										<option value="Rumah-Gedung">Rumah-Gedung</option>
										<option value="Gedung">Gedung</option>
									</select>
								</div>
								<div class="form-group">
									<span class="label label-default">Penyelenggara:</span>
									<select class="form-control" name="penyelenggara">
										<option value="{{$order->penyelenggara}}">{{$order->penyelenggara}}</option>
										<option value="Pihak Putra">Pihak Putra</option>
										<option value="Pihak Putri">Pihak Putri</option>
										<option value="Gabungan">Gabungan</option>
									</select>
								</div>
								<div class="form-group">
									<span class="label label-default">Jumlah Tamu Undangan: </span>
									<input type="text" name="total_tamu" class="form-control" value="{{$order->total_tamu}}">
								</div>
								<div class="form-group">
									<span class="label label-default">Jenis Jamuan: </span>
									<input type="text" name="jenis_jamuan" class="form-control" value="{{$order->jenis_jamuan}}">
								</div>
								<div class="form-group">
									<span class="label label-default">DP: </span>
									<input type="text" name="dp" value="{{$order->dp}}" class="form-control">
								</div>
								<div class="form-group">
								    
									<span class="label label-default">Upload: </span> 
									@if($order->file!=NULL)
									<img src="{{url('storage/app/uploads/pdf.png')}}" style="width:30px; height:30px;">
									@endif
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
											<span class="label label-default">Nama Lengkap Pria: </span>
											<input type="text" name="nama_lengkap_pria" class="form-control" value="{{$biodata->nama_lengkap_pria}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Alamat Pria: </span>
											<input type="text" name="alamat_pria" class="form-control" value="{{$biodata->alamat_pria}}">
										</div>
										<div class="form-group">
											<span class="label label-default">CP Pria:</span>
											<input type="text" name="cp_pria" class="form-control" value="{{$biodata->cp_pria}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Tempat Tanggal Lahir:</span>
											<input type="text" name="ttl_pria" class="form-control" value="{{$biodata->ttl_pria}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Agama Pria:</span>
											<input type="text" name="agama_pria" class="form-control" value="{{$biodata->agama_pria}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Pendidikan Pria</span>
											<input type="text" name="pendidikan_pria" class="form-control" value="{{$biodata->pendidikan_pria}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Tinggi Badan Pria:</span>
											<input type="text" name="tinggi_badan_pria" class="form-control" value="{{$biodata->tinggi_badan_pria}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Berat Badan Pria:</span>
											<input type="text" name="berat_badan_pria" class="form-control" value="{{$biodata->berat_badan_pria}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Ayah:</span>
											<input type="text" name="ayah_pria" class="form-control" value="{{$biodata->ayah_pria}}">
										</div>
										<div class="form-group">
											<span class="label label-default">CP Ayah:</span>
											<input type="text" name="cp_ayah_pria" class="form-control" value="{{$biodata->cp_ayah_pria}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Ibu:</span>
											<input type="text" name="ibu_pria" class="form-control" value="{{$biodata->ibu_pria}}">
										</div>
										<div class="form-group">
											<span class="label label-default">CP Ibu:</span>
											<input type="text" name="cp_ibu_pria" class="form-control" value="{{$biodata->cp_ibu_pria}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Nama Kakak:</span>
											<input type="text" name="nama_kakak_pria" class="form-control" id="tokenfield" data-role="tagsinput" value="{{$biodata->kakak_pria}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Nama Adik:</span>
											<input type="text" name="nama_adik_pria" class="form-control" id="tokenfield" data-role="tagsinput" value="{{$biodata->adik_pria}}">
										</div>

									</div>
									<div class="col-md-6">

										<div class="form-group">
											<span class="label label-default">Nama Lengkap wanita: </span>
											<input type="text" name="nama_lengkap_wanita" class="form-control" value="{{$biodata->nama_lengkap_wanita}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Alamat wanita: </span>
											<input type="text" name="alamat_wanita" class="form-control" value="{{$biodata->alamat_wanita}}">
										</div>
										<div class="form-group">
											<span class="label label-default">CP wanita:</span>
											<input type="text" name="cp_wanita" class="form-control" value="{{$biodata->cp_wanita}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Tempat Tanggal Lahir:</span>
											<input type="text" name="ttl_wanita" class="form-control" value="{{$biodata->ttl_wanita}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Agama wanita:</span>
											<input type="text" name="agama_wanita" class="form-control" value="{{$biodata->agama_wanita}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Pendidikan wanita</span>
											<input type="text" name="pendidikan_wanita" class="form-control" value="{{$biodata->pendidikan_wanita}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Tinggi Badan wanita:</span>
											<input type="text" name="tinggi_badan_wanita" class="form-control" value="{{$biodata->tinggi_badan_wanita}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Berat Badan wanita:</span>
											<input type="text" name="berat_badan_wanita" class="form-control" value="{{$biodata->berat_badan_wanita}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Ayah:</span>
											<input type="text" name="ayah_wanita" class="form-control" value="{{$biodata->ayah_wanita}}">
										</div>
										<div class="form-group">
											<span class="label label-default">CP Ayah:</span>
											<input type="text" name="cp_ayah_wanita" class="form-control" value="{{$biodata->cp_ayah_wanita}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Ibu:</span>
											<input type="text" name="ibu_wanita" class="form-control" value="{{$biodata->jenis_jamuan}}">
										</div>
										<div class="form-group">
											<span class="label label-default">CP Ibu:</span>
											<input type="text" name="cp_ibu_wanita" class="form-control" value="{{$biodata->cp_ibu_wanita}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Nama Kakak:</span>
											<input type="text" name="nama_kakak_wanita" class="form-control" id="tokenfield" data-role="tagsinput" value="{{$biodata->kakak_wanita}}">
										</div>
										<div class="form-group">
											<span class="label label-default">Nama Adik:</span>
											<input type="text" name="nama_adik_wanita" class="form-control" id="tokenfield" data-role="tagsinput" value="{{$biodata->adik_wanita}}">
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
                  @foreach ($item as $index => $ini)
                    <div class="form-group" id="item{{$index}}">
  										<div class="row">
  											<div class="col-md-8">
  												<input type="text" name="item{{$index}}" id="" value="{{$ini->item}}" class="form-control" placeholder="Nama Barang">
  											</div>
  											<div class="col-md-4">
  												<input type="number" name="cost{{$index}}" value="{{$ini->cost}}" class="form-control" placeholder="harga">
  											</div>
                        <input type="hidden" name="idItem{{$index}}" id="idItem{{$index}}" value="{{$ini->id}}">
  										</div>
  									</div>
                  @endforeach
									<div id="contentItem"></div>
									<div id="hapusItem"></div>
									<input type="hidden" name="totalHapusItem" id="totalHapusItem" value="0">
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
                  @foreach ($acara as $index => $ini)
                    <div class="form-group" id="acara{{$index}}">
  										<div class="row">
  											<div class="col-md-4">
  												<input type="text" name="acara{{$index}}" value="{{$ini->acara}}" class="form-control" placeholder="Acara Pelaksanaan">
  											</div>
  											<div class="col-md-3">
  												<input type="text" name="tanggal{{$index}}" value="{{$ini->tanggal}}" class="datepicker form-control" placeholder="Tanggal" readonly>
  											</div>
												<div class="col-md-2">
													<input type="text" name="jam{{$index}}" value="{{$ini->jam}}" class="form-control" placeholder="Jam">
												</div>
  											<div class="col-md-3">
  												<input type="text" name="tempat{{$index}}" value="{{$ini->tempat}}" class="form-control" placeholder="Tempat">
  											</div>
                        <input type="hidden" name="idAcara{{$index}}" id="idAcara{{$index}}" value="{{$ini->id}}">
  										</div>
  									</div>
                  @endforeach
									<div id="contentAcara"></div>
									<div id="hapusAcara"></div>
									<input type="hidden" name="totalHapusAcara" id="totalHapusAcara" value="0">
								</div>
							</div>
						</div>
					</div>
					{{-- end row --}}
				</div>
			</div>
			{{-- end row --}}

      <input type="hidden" name="id" value="{{$order->id}}">
			<input type="hidden" name="totalItem" id="totalItem" value="{{$totalItem}}">
			<input type="hidden" name="totalAcara" id="totalAcara" value="{{$totalAcara}}">
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
var i = {!!$totalItem-1!!};
var h = 0;
var a = {!!$totalAcara-1!!};
var ha = 0;
// console.log("total item saat ini : "+i);

function datepicker(){
$('.datepicker').datepicker({
    language: 'id',
    format:'yyyy-mm-dd'
  });
}
$(document).ready(function(){
	$("#orderForm").validate({
		rules:{
			dp:{
				required:true,
				digits: true
			}
		}
	});
	$('#tokenfield').tagsinput('items');
  datepicker();
	if(i>0){
		$("#removeItem").html("<button class='btn btn-danger' type=button onclick='removeItem();'>Remove</button>")
	}
	if(a>0){
		$("#removeAcara").html("<button class='btn btn-danger' type=button onclick='removeAcara();'>Remove</button>")
	}
	console.log("total item "+i);
	console.log("total acara "+a);
	// $("#orderForm").validate({
	// 	rules:{
	// 		upload:{
	// 			required:true
	// 		}
	// 	}
	// });
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
				<input type=hidden name=idItem"+i+" value=0 >\
			</div>\
		</div>\
		");
	$("#totalItem").val(i+1);
	console.log("total Item saat ini "+$("#totalItem").val());
	// console.log('item added',i);
	// $("#contentItem").append("")
}
function removeItem(){
	$("#hapusItem").append("<input type=hidden id=hapus"+h+" name=hapus"+h+" value="+$("#idItem"+i).val()+" >");
	console.log($("#totalHapusItem").val());
	console.log("telah terhapus id item"+$("#hapus"+h).val());
	h+=1;
	$("#totalHapusItem").val(h);
	$("#item"+i).remove();
	console.log("item removed",i);
	i-=1;
	if(i==0){
		$("#removeItem").html("");
	}
	$("#totalItem").val(i+1);
	console.log($("#totalItem").val());
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
					<input type='text' name='tanggal"+a+"' class='datepicker form-control' placeholder='Tanggal' readonly>\
				</div>\
				<div class='col-md-2'>\
					<input type='text' name='jam"+a+"' class='form-control' placeholder='Jam'>\
				</div>\
				<div class='col-md-3'>\
					<input type='text' name='tempat"+a+"' class='form-control' placeholder='Tempat'>\
				</div>\
				<input type=hidden name=idAcara"+a+" value=0 >\
			</div>\
		</div>\
		");
		$("#totalAcara").val(a+1);
		console.log("total Acara saat ini "+$("#totalAcara").val());
	console.log('Acara added',a);
	// $("#contentItem").append("")
	datepicker();

}
function removeAcara(){
	$("#hapusAcara").append("<input type=hidden id=delAcara"+ha+" name=delAcara"+ha+" value="+$("#idAcara"+a).val()+" >");
	console.log($("#totalHapusAcara").val());
	console.log("telah terhapus id acara"+$("#hapus"+ha).val());
	ha+=1;
	$("#totalHapusAcara").val(ha);
	$("#acara"+a).remove();
	console.log("acara removed",a);

	a-=1;
	if(a==0){
		$("#removeAcara").html("");
	}
	$("#totalAcara").val(a+1);
	console.log($("#totalAcara").val());
	console.log("Acara removed",a);
}
</script>

@endsection
