@extends('layout.mainlayout')
@section('Toko', 'Bissmillah')

@section('css_custom')
<!-- CUSTOM CSS -->
<!-- Select2 - Search Dropdown -->
<link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> 
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Toko</a></li>
<li class="breadcrumb-item active">Toko </li>
@endsection

@section('content')

<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Toko</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="/insertToko" method="POST">
                  @csrf
                <div class="card-body">
                <div class="form-group">
                    <label>Barcode</label>
                    <input hidden atype="text" class="form-control" id="barcode" name="barcode" placeholder="cek dulu barcode">
                </div>
                <div class="form-group">
                    <label>Nama Toko</label>
                    <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Latitude</label>
                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Longitude</label>
                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Accuracy</label>
                    <input type="text" class="form-control" id="accuracy" name="accuracy" placeholder="">
                </div>
                <p id="demo"></p>
                <div class="card-footer">
                    <button type="button" class="btn btn-secondary" onclick="getLocation()">Get Location</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
                <!-- /.card -->
        </div>
</div>
    
@endsection

@section('js_custom')
<!-- CUSTOM JS -->
<!-- GetLocation -->
<script>
    var a = document.getElementById("latitude");
    var b = document.getElementById("longitude");
    var c = document.getElementById("accuracy");
    var x = document.getElementById("demo");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(showPosition);
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
    a.value = position.coords.latitude;
    b.value= position.coords.longitude;
    c.value= position.coords.accuracy;
    }
</script>
@endsection