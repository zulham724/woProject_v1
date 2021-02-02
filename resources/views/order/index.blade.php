@extends(Auth::user()->id==1 ? 'layouts.admin-horizontal' : 'layouts.operator-horizontal')
@section('order-active','class=menu-top-active')
@section('css')

@endsection
@section('content')
<div class="container">
	<div class="container">
	<a href="{{(Auth::user()->role_id == 1) ? url('admin/order/create') : url('operator/order/create')}}"><button type="button" class="btn btn-success">Insert new Order</button></a><hr>

	<div class="panel panel-default">
		<div class="panel-heading">
			Order List
		</div>
		{{-- end heading --}}
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Pemesan</th>
							<th>Email</th>
							<th>Alamat</th>
							<th>Kota</th>
							<th>CP</th>
							<th>Tempat</th>
							<th>Penyelenggara</th>
							<th>Total Tamu</th>
							<th>Jenis Jamuan</th>
							<th>Tanggal Order</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($orders as $index => $ini)
						<tr>
							<td>{{$index+1}}</td>
							<td>{{$ini->nama_pemesan}}</td>
							<td>{{$ini->email_pemesan}}</td>
							<td>{{$ini->alamat_pemesan}}</td>
							<td>{{$ini->kota_pemesan}}</td>
							<td>{{$ini->cp_pemesan}}</td>
							<td>{{$ini->pelaksanaan_acara}}</td>
							<td>{{$ini->penyelenggara}}</td>
							<td>{{$ini->total_tamu}}</td>
							<td>{{$ini->jenis_jamuan}}</td>
							<td>{{date('d-m-Y', strtotime($ini->created_at))}}</td>
							<td>
								<span data-toggle="modal" data-target="#modalBiodata" onclick="biodata({{$ini->id}})">
									<a class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="Lihat Biodata">
									<i class="fa fa-search"></i>
									</a>
								</span>
								<span data-toggle="modal" data-target="#modalItem" onclick="item({{$ini->id}})">
									<a class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="Lihat Pesanan Barang">
									<i class="fa fa-shopping-cart"></i>
									</a>
								</span>
								<span data-toggle="modal" data-target="#modalAcara" onclick="acara({{$ini->id}})">
									<a class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="Lihat Pesanan Acara">
									<i class="fa fa-truck"></i>
									</a>
								</span>
								<span data-toggle="modal" data-target="#myModal">
									<a class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="Edit Pesanan" onclick="event.preventDefault();document.getElementById('edit{{$ini->id}}').submit();">
									<i class="fa fa-edit"></i>
									</a>
								</span>
								<span data-toggle="modal" data-target="#myModal">
									<a class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="Hapus Pesanan" onclick="event.preventDefault();document.getElementById('delete{{$ini->id}}').submit();">
									<i class="fa fa-times"></i>
									</a>
								</span>
		            @if($ini->file!=NULL)
		            <a href="{{($ini->upload == null) ? "#" : url('storage/app/'.$ini->upload)}}" class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="Download">
		            <i class="fa fa-cloud-download "></i>
		            </a>
		            @endif
								<span data-toggle="modal" data-target="#modalPrint" onclick="print({{$ini->id}})">
									<a class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="Cetak Pesanan">
									<i class="fa fa-print"></i>
									</a>
								</span>

								<form id="delete{{$ini->id}}" method="POST" action="{{(Auth::user()->role_id == 1) ? url('admin/order/delete') : url('operator/order/delete')}}">
									<input type="hidden" name="file" value="{{$ini->upload}}">
									<input type="hidden" name="id" value="{{$ini->id}}">
									{{csrf_field()}}
								</form>
								<form id="edit{{$ini->id}}" method="POST" action="{{(Auth::user()->role_id == 1) ? url('admin/order/edit') : url('operator/order/edit')}}">
									{{-- <input type="hidden" name="file" value="{{$ini->upload}}"> --}}
									<input type="hidden" name="id" value="{{$ini->id}}">
									{{csrf_field()}}
								</form>
							</td>
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
</div>

{{-- every modal placed here --}}
<!-- Modal -->
<div id="modalBiodata" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Biodata</h4>
      </div>
      <div class="modal-body" id="biodata-body">
        <div class="row">
        	<div class="col-md-6">
        		<h3>Pria</h3>
        		<div class="form-group">
        			<span class="label label-default">Nama Lengkap</span>
        			<h4 class="form-control" id="nama_lengkap_pria"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Alamat</span>
        			<h4 class="form-control" id="alamat_pria"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">CP</span>
        			<h4 class="form-control" id="cp_pria"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Tempat Tanggal Lahir</span>
        			<h4 class="form-control" id="ttl_pria"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Agama</span>
        			<h4 class="form-control" id="agama_pria"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Pendidikan</span>
        			<h4 class="form-control" id="pendidikan_pria"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Tinggi Badan</span>
        			<h4 class="form-control" id="tinggi_badan_pria"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Berat Badan</span>
        			<h4 class="form-control" id="berat_badan_pria"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Nama Ayah</span>
        			<h4 class="form-control" id="nama_ayah_pria"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">CP Ayah</span>
        			<h4 class="form-control" id="cp_ayah_pria"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Nama Ibu</span>
        			<h4 class="form-control" id="nama_ibu_pria"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">CP Ibu</span>
        			<h4 class="form-control" id="cp_ibu_pria"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Kakak</span>
        			<h4 class="form-control" id="kakak_pria"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Adik</span>
        			<h4 class="form-control" id="adik_pria"></h4>
        		</div>
        	</div>
        	<div class="col-md-6">
        		<h3>Wanita</h3>
        		<div class="form-group">
        			<span class="label label-default">Nama Lengkap</span>
        			<h4 class="form-control" id="nama_lengkap_wanita"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Alamat</span>
        			<h4 class="form-control" id="alamat_wanita"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">CP</span>
        			<h4 class="form-control" id="cp_wanita"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Tempat Tanggal Lahir</span>
        			<h4 class="form-control" id="ttl_wanita"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Agama</span>
        			<h4 class="form-control" id="agama_wanita"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Pendidikan</span>
        			<h4 class="form-control" id="pendidikan_wanita"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Tinggi Badan</span>
        			<h4 class="form-control" id="tinggi_badan_wanita"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Berat Badan</span>
        			<h4 class="form-control" id="berat_badan_wanita"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Nama Ayah</span>
        			<h4 class="form-control" id="nama_ayah_wanita"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">CP Ayah</span>
        			<h4 class="form-control" id="cp_ayah_wanita"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Nama Ibu</span>
        			<h4 class="form-control" id="nama_ibu_wanita"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">CP Ibu</span>
        			<h4 class="form-control" id="cp_ibu_wanita"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Kakak</span>
        			<h4 class="form-control" id="kakak_wanita"></h4>
        		</div>
        		<div class="form-group">
        			<span class="label label-default">Adik</span>
        			<h4 class="form-control" id="adik_wanita"></h4>
        		</div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="modalItem" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pesanan Barang</h4>
      </div>
      <div class="modal-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="table">
						<thead>
							<tr>
								<td>No.</td>
								<td>Barang</td>
								<td>Harga</td>
								<td>tanggal pesan</td>
							</tr>
						</thead>
						<tbody id="contentItem">

						</tbody>
					</table>
				</div>
      	<h4 class="form-control">Total: </h4><h4 class="form-control" id="totalHarga"></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="modalAcara" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pesanan Acara</h4>
      </div>
      <div class="modal-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="table">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="modalPrint" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Print Preview</h4>
      </div>
      <div class="modal-body">
				<div id="printThis">
					<div class="text-center">
						<img src="{{url('public/img/logo/logo.png')}}" />
						<h4>Wedding & Event Organizer</h4>
						<h5>Jl.Pandanaran 126.Ruko Masjid Baiturrahman,Simpang Lima ,Semarang. Telp (024) 8313313</h5>
					</div><hr>
					<table border="0">
						<tr>
							<td>Pemesan </td> <td> : </td><td> <h4 id="printPemesan"></h4></td>
						</tr>
						<tr>
							<td>Alamat </td> <td> : </td><td> <h4 id="printAlamat"></h4></td>
						</tr>
						<tr>
							<td>Kota </td> <td> : </td><td> <h4 id="printKota"></h4></td>
						</tr>
						<tr>
							<td>Telp </td> <td> : </td><td> <h4 id="printTelp"></h4></td>
						</tr>
						<tr>
							<td>Tempat dan Tanggal Acara </td> <td> </td><td> <h4> </h4></td>
						</tr>
					</table>
						<div id="printHari" style="padding-left:100px">

						</div>
					<hr>
					<table class="table table-bordered">
	      		<thead>
	      			<tr>
	      				<td>No.</td>
	      				<td>Deskripsi</td>
	      				<td>Harga</td>
	      				<td>tanggal pesan</td>
	      			</tr>
	      		</thead>
	      		<tbody id="printItem">

	      		</tbody>
	      	</table>
					<div class="row">
						<div class="col-xs-12">
							<div class="col-xs-offset-6">
							    <div id="printTotalHarga"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="col-xs-offset-6">
							    <div id="printDp"></div></td></tr>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="col-xs-offset-6"><div id="printPembayaran"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="col-xs-offset-6">
							    <div id="printSisaPembayaran"></div>
							</div>
						</div>
					</div>
					<div class="row" style="height:100px">
						<div class="col-xs-12">
							<div class="col-xs-6">
								<h4>Hormat Kami</h4>
							</div>
							<div class="col-xs-6">
								<h4>Pemesan</h4>
							</div>
						</div>
					</div>
					<div class="row" style="height:10px">
						<div class="col-xs-12">
							<div class="col-xs-6">
								<h4>Success</h4>
							</div>
							<div class="col-xs-6">
								<h4 id="printPemesan2"></h4>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<p>Syarat dan Ketentuan Berlaku: <br>
							1.Tanda jadi Rp.5.000.000,-<br>
							2.Mengikat Harga 30 % dari Nilai Kontrak<br>
							3.Pemesanan ini mengikat,pembatalan per item atau keseluruhan di kenakan Charge 50% dari nilai kontrak <br>							
							4.Pelunasan H- 14 Hari <br>
							5.Apabila point 4 tidak terpenuhi,pemesanan di anggap Batal dan Pembayaran yg sudah masuk Hangus <br>
							6.Pembayaran dapat di lakukan secara tunai atau transfer ke rek.mandiri A/n Ratna Hidayati 1390004731299</p>
						</div>
					</div>
					<hr>
				</div>
				{{-- end printthis --}}
				<button type="button" name="button" class="btn btn-info btn-block" onclick="print_now()">Print Now</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
{{-- test --}}

@endsection
@section('script')
<script type="text/javascript">

$(document).ready(function(){

	$('[data-toggle="tooltip"]').tooltip();

});
// end ready

function biodata(id){
	var biodata = {!!$biodata!!}.filter(function(ini){
		return ini.order_id==id;
	});
	console.log(biodata);
	$("#nama_lengkap_pria").text((biodata[0].nama_lengkap_pria == null)? "kosong" : biodata[0].nama_lengkap_pria);
	$("#alamat_pria").text((biodata[0].alamat_pria == null)? "kosong" : biodata[0].alamat_pria);
	$("#cp_pria").text((biodata[0].cp_pria == null)? "kosong" : biodata[0].cp_pria);
	$("#ttl_pria").text((biodata[0].ttl_pria == null)? "kosong" : biodata[0].ttl_pria);
	$("#agama_pria").text((biodata[0].agama_pria == null)? "kosong" : biodata[0].agama_pria);
	$("#pendidikan_pria").text((biodata[0].pendidikan_pria == null)? "kosong" : biodata[0].pendidikan_pria);
	$("#tinggi_badan_pria").text((biodata[0].tinggi_badan_pria == null)? "kosong" : biodata[0].tinggi_badan_pria);
	$("#berat_badan_pria").text((biodata[0].berat_badan_pria == null)? "kosong" : biodata[0].berat_badan_pria);
	$("#nama_ayah_pria").text((biodata[0].ayah_pria == null)? "kosong" : biodata[0].ayah_pria);
	$("#cp_ayah_pria").text((biodata[0].cp_ayah_pria == null)? "kosong" : biodata[0].cp_ayah_pria);
	$("#nama_ibu_pria").text((biodata[0].ibu_pria == null)? "kosong" : biodata[0].ibu_pria);
	$("#cp_ibu_pria").text((biodata[0].cp_ibu_pria == null)? "kosong" : biodata[0].cp_ibu_pria);
	$("#kakak_pria").text((biodata[0].kakak_pria == null)? "kosong" : biodata[0].kakak_pria);
	$("#adik_pria").text((biodata[0].adik_pria == null)? "kosong" : biodata[0].adik_pria);
	$("#nama_lengkap_wanita").text((biodata[0].nama_lengkap_wanita == null)? "kosong" : biodata[0].nama_lengkap_wanita);
	$("#alamat_wanita").text((biodata[0].alamat_wanita == null)? "kosong" : biodata[0].alamat_wanita);
	$("#cp_wanita").text((biodata[0].cp_wanita == null)? "kosong" : biodata[0].cp_wanita);
	$("#ttl_wanita").text((biodata[0].ttl_wanita == null)? "kosong" : biodata[0].ttl_wanita);
	$("#agama_wanita").text((biodata[0].agama_wanita == null)? "kosong" : biodata[0].agama_wanita);
	$("#pendidikan_wanita").text((biodata[0].pendidikan_wanita == null)? "kosong" : biodata[0].pendidikan_wanita);
	$("#tinggi_badan_wanita").text((biodata[0].tinggi_badan_wanita == null)? "kosong" : biodata[0].tinggi_badan_wanita);
	$("#berat_badan_wanita").text((biodata[0].berat_badan_wanita == null)? "kosong" : biodata[0].berat_badan_wanita);
	$("#nama_ayah_wanita").text((biodata[0].ayah_wanita == null)? "kosong" : biodata[0].ayah_wanita);
	$("#cp_ayah_wanita").text((biodata[0].cp_ayah_wanita == null)? "kosong" : biodata[0].cp_ayah_wanita);
	$("#nama_ibu_wanita").text((biodata[0].ibu_wanita == null)? "kosong" : biodata[0].ibu_wanita);
	$("#cp_ibu_wanita").text((biodata[0].cp_ibu_wanita == null)? "kosong" : biodata[0].cp_ibu_wanita);
	$("#kakak_wanita").text((biodata[0].kakak_wanita == null)? "kosong" : biodata[0].kakak_wanita);
	$("#adik_wanita").text((biodata[0].adik_wanita == null)? "kosong" : biodata[0].adik_wanita);
}
function item(id){
	console.log({!!$items!!});
	var item = {!!$items!!}.filter(function(ini){
		return ini.order_id==id;
	});
	var harga=0;
	console.log(item);
	$("#title").text("Pesanan Barang");
	$("#contentItem").html("");
	$.each(item,function(key,i){
		key+=1;
		harga+=Number(this.cost);
		$("#contentItem").append("\
			<tr>\
				<td>"+key+"</td>\
				<td>"+this.item+"</td>\
				<td class=costItem >"+this.cost+"</td>\
				<td>"+this.created_at+"</td>\
			</tr>\
			");
	});
	$("#totalHarga").text(harga);
	$(".costItem").formatCurrency({ colorize:true, region: 'id-ID' });
}
function acara(id){
	console.log({!!$acara!!});
	var acara = {!!$acara!!}.filter(function(ini){
		return ini.order_id==id;
	});
	console.log(acara);
	$("#title").text("Pesanan Acara");
	$("#contentAcara").html("");
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
function print(id){
	console.log({!!$items!!});
	var item = {!!$items!!}.filter(function(ini){
		return ini.order_id==id;
	});
	var biodata = {!!$biodata!!}.filter(function(ini){
		return ini.order_id==id;
	});
	var order = {!!$orders!!}.filter(function(ini){
		return ini.id==id;
	});
	var acara = {!!$acara!!}.filter(function(ini){
		return ini.order_id==id;
	});
	var pembayaran = {!!$pembayaran!!}.filter(function(ini){
		return ini.order_id==id;
	});
	var harga=0;
	var totalAngsuran=0;
	console.log(item,biodata,order,pembayaran);
	$("#printItem").html("");
	$.each(item,function(key,i){
		key+=1;
		harga+=Number(this.cost);
		$("#printItem").append("\
			<tr>\
				<td>"+key+"</td>\
				<td>"+this.item+"</td>\
				<td class=costItem >"+this.cost+"</td>\
				<td>"+this.created_at+"</td>\
			</tr>\
			");
	});

	$("#printTotalHarga").html("<h4>Total Harga :</h4><h4 class='totalHarga form-control'>"+harga+"</h4> ");
	$("#printPemesan").text((order[0].nama_pemesan != null ) ? " "+order[0].nama_pemesan : " ");
	$("#printAlamat").text((order[0].alamat_pemesan != null ) ? " "+order[0].alamat_pemesan : " ");
	$("#printKota").text((order[0].kota_pemesan != null ) ? " "+order[0].kota_pemesan : " ");
	$("#printTelp").text((order[0].cp_pemesan != null ) ? " "+order[0].cp_pemesan : " ");
	$("#printHari").html("");
	$.each(acara,function(key,i){
		$("#printHari").append("<h4>"+this.acara+" : "+this.tanggal+"</h4>");
	});
	$("#printPemesan2").text(order[0].nama_pemesan);
	$("#printDp").html("<h4>DP :</h4><h4 class='dp form-control'>"+Number(order[0].dp)+"</h4> ");

	$("#printPembayaran").html("");

	$.each(pembayaran,function(key,i){
		totalAngsuran += Number(this.angsuran);
		console.log(this.angsuran);
		console.log(totalAngsuran);
		key+=1;
		var date = new Date(this.created_at);
		$("#printPembayaran").append("<h4> Angsuran "+key+": "+date.getDate() + '-' + (date.getMonth() + 1) + '-' +  date.getFullYear()+"</h4><h4 class='angsuran form-control'>"+this.angsuran+"</h4>");
	});

	var sisaPembayaran = harga - (Number(order[0].dp) + Number(totalAngsuran));

	$("#printSisaPembayaran").html("<h4>Sisa Pembayaran</h4><h4 class='sisaPembayaran form-control'>"+Number(sisaPembayaran)+"</h4> ");

	console.log(harga,Number(order[0].dp),"total angsuran nya adalah : "+Number(totalAngsuran),sisaPembayaran);

	$(".totalHarga").formatCurrency({ colorize:true, region: 'id-ID' });
	$(".dp").formatCurrency({ colorize:true, region: 'id-ID' });
	$(".sisaPembayaran").formatCurrency({ colorize:true, region: 'id-ID' });
	$(".angsuran").formatCurrency({ colorize:true, region: 'id-ID' });
	$(".costItem").formatCurrency({ colorize:true, region: 'id-ID' });
}
function print_now(){
	$("#printThis").printThis();
}

</script>
@endsection
