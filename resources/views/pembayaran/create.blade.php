@extends(Auth::user()->role_id==1 ? 'layouts.admin-horizontal' : 'layouts.operator-horizontal');
@section('pembayaran-active','class=menu-top-active')
@section('css')

@endsection
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">

        <div class="panel panel-default">
          <div class="panel-heading">
            Pembayaran Angsuran
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table id="table" class="table table-bordered">
                <thead>
                  <tr>
                    <td>No</td>
                    <td>Nama Pemesan</td>
                    <td>Action</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $index => $ini)
                    <tr>
                      <td>{{$index+1}}</td>
                      <td>{{$ini->nama_pemesan}}</td>
                      <td>
                        <button type="button" class="btn btn-warning" name="button" onclick="choose({{$ini->id}},'{{$ini->nama_pemesan}}')">Choose</button>
                        <button type="button" class="btn btn-info" name="button" onclick="edit({{$ini->id}})">Edit</button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <form class="form" id="myForm" action="{{(Auth::user()->role_id == 1) ? url('admin/pembayaran/store') : url('operator/pembayaran/store')}}" method="post">
              <div class="form-group">
                <span class="label label-default">Pemesan: </span>
                <input type="text" name="nama_pemesan" id="nama_pemesan" class="form-control" value="" readonly>
                <input type="hidden" name="order_id" id="order_id" readonly class="form-control">
              </div>
              <div class="form-group">
                <span class="label label-default">Angsuran: </span>
                <input type="number" name="angsuran" id="angsuran" class="form-control" value="">
              </div>
              {{csrf_field()}}
              <button type="submit" class="btn btn-success btn-block" name="button">Submit</button>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
  {{-- end container --}}

  {{-- every modal placed here --}}
  <!-- Modal -->
  <div id="modalEdit" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <h1 id="test"></h1>
          <div class="panel panel-default">
            <div class="panel-heading">
              Form Edit Pembayaran
            </div>
            <div class="panel-body">
              <form class="form" id="#myForm" action="{{(Auth::user()->role_id == 1) ? url('admin/pembayaran/update') : url('operator/pembayaran/update')}}" method="POST">
                <div id="contentPembayaran">

                </div>
                <input type="hidden" name="totalAngsuran" id="totalAngsuran" value="0">
                {{csrf_field()}}
                <button type="submit" class="btn btn-success btn-block" name="button">Submit</button>
              </form>
            </div>
          </div>
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
  $(document).ready(function(){
    console.log('yey');
    $("#myForm").validate({
      rules:{
        angsuran:{
          required:true,
          digits:true,
        }
      }
    });
  });

  function choose(id,nama_pemesan){
    $("#nama_pemesan").val(nama_pemesan);
    $("#order_id").val(id);
  }

  function edit(id){
    var totalAngsuran = 0;

    $("#modalEdit").modal();

    var pembayaran = {!!$pembayaran!!}.filter(function(i){
      return i.order_id == id;
    });
    console.log(pembayaran);
    $("#contentPembayaran").html("");
    $.each(pembayaran,function(key,i){
      console.log(key);
      console.log(i['id']);
      key+=1;
      totalAngsuran+=1;
      $("#contentPembayaran").append(
        "<div class=form-group >\
          <label> Angsuran "+key+":</label><a href={{url('admin/pembayaran/delete')}}/"+i['id']+"><button type='button' class='btn btn-danger' name='button' >Hapus</button></a>\
          <input class='form-control' name='angsuran"+key+"' type='text' value='"+this.angsuran+"' >\
          <input type=hidden name='idAngsuran"+key+"' value='"+this.id+"'>\
        </div>"
      );
      // $("#test").text(totalAngsuran);
      $("#totalAngsuran").val(totalAngsuran);
    });
  }
</script>
@endsection
