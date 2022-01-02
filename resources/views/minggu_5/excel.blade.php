<html>
@extends('layouts.master')
@section('title', "Data Pengguna")
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Pengguna
            <!-- <small>Control panel</small> -->
        </h1><br><br>

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status')}}
        </div>
        @endif

        @if (isset($errors) && $errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
        </div>
        @endif

        <div>

            <button type="button" class="btn btn-primary">Export</button>
            <button type="button" data-toggle="modal" data-target="#Medium-modal" class="btn btn-danger">Import
            </button>
            <br><br>
        </div>

        <table id="table" style="text-align: center;background-color: orange" class="table table-bordered table-hover">
            @csrf
            <thead>
                <tr>

                    <th>ID_Customer</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kode Pos</th>
                </tr>
            </thead>
            @foreach($Pengguna as $data)
            <tr>
                <td>{{ $data -> id_customer }}</td>
                <td>{{ $data -> nama }}</td>
                <td>{{ $data -> alamat }}</td>
                <td>{{ $data -> kodepos }}</td>
            </tr>
            @endforeach
        </table>

        <ol class="breadcrumb">
            <li><a href="datacustomer"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Customer</li>
        </ol>
    </section>
    <!-- Main content -->
    <!-- /.content -->
</div>

<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
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

@endsection

@section('script')
<script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
@endsection

</html>