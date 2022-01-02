@extends('layout.mainlayout')
@section('Customer_v1', 'Bissmillah')

@section('css_custom')
<!-- CUSTOM CSS -->
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Home </li>
@endsection

@section('content')
   
<!-- Content Wrapper. Contains page content -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Customer</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>No</th>
                              <th>ID Customer</th>
                              <th>Nama</th>
                              <th>Alamat</th>
                              <th>Kelurahan</th>
                              <th>Foto</th>
                            </tr>
                            </thead>
                            @foreach($customer as $data)
                            <tr>  
                              <td>{{ $loop -> iteration }}</td>
                              <td>{{ $data -> id_customer }}</td>
                              <td>{{ $data -> nama }}</td>
                              <td>{{ $data -> alamat }}</td>
                              <td>{{ $data -> nama_kelurahan }}</td>
                              @if($data->foto == null)
                              <td><img src="{{ asset('/storage/'.$data->file_path) }}" alt=""></td>
                              @else
                              <td><img src="{{ $data->foto }}" alt=""></td>
                              @endif
                            </tr>
                            @endforeach  
                          </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>
    
@endsection

@section('js_custom')
<!-- JS CUSTOM -->
@endsection