@extends('layout.mainlayout')
@section('Insert Barcode', 'Bissmillah')

@section('css_custom')
<!-- CUSTOM CSS -->
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Barcode</a></li>
<li class="breadcrumb-item active">Insert Barcode</li>
@endsection

@section('content')
   
<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action=" ">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">id_barang</label>
                    <input hidden type="text" class="form-control" id="id_barang" name="id_barang">
                  </div>
                  <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                  </div>
                  <div class="form-group">
                    <label for="">TimeStamp</label>
                    <input type="text" class="form-control" id="timestamp" name="timestamp">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
    
@endsection

@section('js_custom')
<!-- JS CUSTOM -->
@endsection