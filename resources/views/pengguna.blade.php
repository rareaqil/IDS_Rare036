@extends('layout.mainlayout')
@section('barcode', 'Bissmillah')

@section('css_custom')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Barcode</a></li>
<li class="breadcrumb-item active">Barcode </li>
@endsection

@section('content')

<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Data Customer</h4>
        <hr>

    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel">
                <h5>Daftar Customer</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <button id="button-print-pdf" class="btn btn-sm btn-info" data-toggle="modal"
                        data-target="#modal-konfirmasi-cetak-1">
                        <i class="fas fa-file-pdf mr-2"></i>
                        IMPORT
                    </button>
                    <a href="{{ route('customerExport') }}" class="btn btn-success">Export</a>
                    <div class="table-responsive">
                        <form action="" class="form-barcode" method="post">
                            @csrf
                            <table id="tabel1" name="tabel1"
                                class="table table-bordered table-responsive-stack datatable-table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Id Customer</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Kode Pos</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($pengguna as $customer)
                                    <tr>
                                        <td>{{ $customer->id_customer }}</td>
                                        <td>{{ $customer->nama }}</td>
                                        <td>{{ $customer->alamat }}</td>
                                        <td>{{ $customer->kodepos }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>



<!-- MODAL 2 -->
<!-- Modal Start -->

<div class="modal fade" id="modal-konfirmasi-cetak-1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{ route('customerImport') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div>
                        <input type="file" name="file" required="required">
                    </div>
                </div>
                <div style="padding-left:15px; padding-bottom:10px">
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- End Konfirmasi Cetak Barcode Modal --}}



<!-- Modal End -->
@endsection