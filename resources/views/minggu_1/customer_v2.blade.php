@extends('layout.mainlayout')
@section('Customer_V2', 'Bissmillah')

@section('css_custom')
<!-- CUSTOM CSS -->
<!-- Select2 - Search Dropdown -->
<link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> 
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Customer V2</a></li>
<li class="breadcrumb-item active">Customer V2 </li>
@endsection

@section('content')

<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Customer V2</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="/insertcustomer_v2" method="POST">
                  @csrf
                <div class="card-body">
                <div class="form-group">
                    <label>ID Customer</label>
                    <input hidden type="text" class="form-control" id="id_cus" name="id_cus" placeholder="Id gatau kok ga incement">
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Siapa sih nama mu ?">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Boleh tau Rumah mu nda ">
                </div>
                <div class="form-group">
                  <label>Provinsi</label>
                  <select id="prov" name="prov" class="form-control select2" style="width: 100%;">
                    <option selected="selected" disable='true' >Pilih provinsi dong</option>
                    @foreach($provinsi as $prov)
                    <option value="{{$prov->id_provinsi}}">{{$prov->nama_provinsi}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Kota</label>
                  <select id="kota" name="kota" class="form-control select2" style="width: 100%;">
                    <option selected="selected" disabled >Kota mana</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Kecamatan</label>
                  <select id="kec" nama="kec" class="form-control select2" style="width: 100%;">
                    <option selected="selected" disabled >Kecamatan ibu mu ?</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Keluarahan</label>
                  <select id="kel" name="kel" class="form-control select2" style="width: 100%;">
                    <option selected="selected" disabled >Keluarahan cidek rumah mu</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>KodePos</label>
                  <select id="kode_p" name="kode_p"class="form-control select2" style="width: 100%;">
                    <option selected="selected" disabled>Yang mana ? aku mau kirim paket</option>
                  </select>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <div class="wrapper-foto">
                        <div class="kontainer-foto">
                            <div src="" alt="Foto" id="result1"></div>
                            <input hidden type="text" id="imagecam" name="imagecam">
                        </div>
                    </div>
                </div>
                
                <div class="form-group d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary tombol-buka-modal-foto" data-toggle="modal" data-target="#modal-ambil-foto">
                        <i class="fas fa-camera mr-2"></i>
                        Ambil Foto
                    </button>
                </div>  
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            {{-- Start Modal Ambil Foto --}}
<div class="modal fade" id="modal-ambil-foto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Modal Ambil Foto</h5>
                <button type="button" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle "></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="modal-wrapper">
                        <div>
                            <div id="my_camera" class="modal-kontainer float-left" style="padding-left:10px">
                        </div>        
                        </div>
                            <div>
                                <div id="result2" class="modal-kontainer float-right" style="padding-left:10px">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer mt-3 float-right">
                        <button id="btn" type="button" class="btn btn-sm btn-secondary " data-toggle="tooltip" data-placement="top" title="Capture">
                            <i class="fas fa-camera"></i>
                            CAPTURE
                        </button>
                        <button id="" type="button" class="btn btn-sm btn-primary " data-dismiss="modal">
                            <i class="fas fa-save mr-2"></i>
                            SIMPAN
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Modal Ambil Foto --}}
    
@endsection

@section('js_custom')
<!-- CUSTOM JS -->
<!-- JS KAMERA -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script>
    Webcam.set({
    width: 320, 
    height: 240,
    image_format: 'png',
    png_quality: 100
  });
  Webcam.attach('#my_camera');
    function take_picture(){
      Webcam.snap(function(data_uri){
        $('#imagecam').val(data_uri);
        document.getElementById('result1').innerHTML = '<img src="' + data_uri +'"/>';
        document.getElementById('result2').innerHTML = '<img src="' + data_uri +'"/>';
      });
    }
    document.getElementById('btn').addEventListener('click', take_picture);
    
</script>

<!-- Java script FORM KOTA-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
 
  $("#prov").change(function(){
    var prov_id=$("#prov").val();
    $.ajax({
      type:"get",
      url:"findKota",
      data:"prov_id="+prov_id,
      success:function(data){
        for(var i=0;i<data.length;i++){
          $('#kota').append('<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>');
        } 
      }
      });
  });

  $("#kota").change(function(){
    var kota_id=$("#kota").val();
    $.ajax({
      type:"get",
      url:"findKecamatan",
      data:"kota_id="+kota_id,
      success:function(data){
        for(var i=0;i<data.length;i++){
          $('#kec').append('<option value="'+data[i].id_kecamatan+'">'+data[i].nama_kecamatan+'</option>');
        } 
      }
      });
  });

  $("#kec").change(function(){
    var kec_id=$("#kec").val();
    $.ajax({
      type:"get",
      url:"findKelurahan",
      data:"kec_id="+kec_id,
      success:function(data){
        for(var i=0;i<data.length;i++){
          $('#kel').append('<option value="'+data[i].id_kelurahan+'">'+data[i].nama_kelurahan+'</option>');
        } 
      }
      });
 
  $("#kel").change(function(){
    var kel_id=$("#kel").val();
    $.ajax({
      type:"get",
      url:"findKodepos",
      data:"kel_id="+kel_id,
      success:function(data){
        for(var i=0;i<data.length;i++){
          $('#kode_p').append('<option value="'+data[i].id_kelurahan+'">'+data[i].kodepos+'</option>');
        } 
      }
      });
    });
   });
});
</script>

<!-- Select2 - Search Select -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
        theme: 'bootstrap4'
    })
    });
</script>
@endsection