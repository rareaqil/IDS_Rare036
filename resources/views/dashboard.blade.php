@extends('layout.mainlayout')
@section('Home', 'Home')

@section('css_custom')
<!-- CUSTOM CSS -->
@endsection

@section('breadcrumb')
<!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Home </li> -->
@endsection

@section('content')
<br><br><br><br><br>
<div class="row d-flex justify-content-center">
        <div class="col-md-10 col-sm-12 card">
            <div class="card-body">
                <h4 class="text-center">Hello, {{ auth()->user()->name }} !</h4>

                <h5 class="text-center mt-3">
                    <i class="fas fa-calendar mr-1"></i>
                    {{ date('D, d M Y') }}
                </h5>

                <hr>
                <h5 class="text-center my-4 font-weight-bold">
                    {{ \Illuminate\Foundation\Inspiring::quote() }}
                </h5>
            </div>
        </div>
    </div>
    
@endsection

@section('js_custom')
<!-- JS CUSTOM -->
@endsection