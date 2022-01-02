@extends('layout.mainlayout')
@section('Kunjungan', 'Bissmillah')

@section('css_custom')
<!-- CUSTOM CSS -->
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Kunjungan</a></li>
<li class="breadcrumb-item active">Kunjungan </li>
@endsection

@section('content')
   
<!-- Content Wrapper. Contains page content -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Toko</h3>
                    </div>
                    <div class="card-body">
                    <div class="card-header">
                        <a type="button" href="/tambahToko" class="btn btn-primary">Tambah Toko</a>
                    </div>    
                    
                        <table id="tabel1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>No</th>
                              <th>Barcode</th>
                              <th>Nama Toko</th>
                              <th>Latitude</th>
                              <th>Longitude</th>
                              <th>Accuracy</th>
                            </tr>
                            </thead>
                            @foreach($toko as $data)
                            <tr>  
                              <td>{{ $loop -> iteration }}</td>
                              <td><?php
                                            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data->barcode, $generator::TYPE_CODE_128,  $widthFactor = 1.5, $height = 37,))                                            . '">';
                                            ?>
                                            <br>
                                            <?= $data->barcode?>
                                            <br>
                                            <?= $data->nama_toko?>
                              </td>
                              <td>{{ $data -> nama_toko }}</td>
                              <td>{{ $data -> latitude }}</td>
                              <td>{{ $data -> longitude }}</td>
                              <td>{{ $data -> accuracy }}</td>
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
<!-- Search -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {

    $('#tabel1').DataTable( {
        dom: 'Bfrtip',
        pagination: 'true',
        searching: 'true',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
});
</script>

@endsection