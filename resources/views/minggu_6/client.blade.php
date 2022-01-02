@extends('layout.mainlayout')
@section('Scoreboard', 'Bissmillah')

@section('content')
<!-- Content -->
<div class="content ">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Scoreboard Client</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('/assets/css/scoreboard-client.css') }}">
    </head>

    <body>

        <div class="container">
            {{-- <div class="timer-container">
                <div class="timer-box">
                    <h1 id="timer"></h1>
                </div>
            </div> --}}
            <h1 style="text-align: center">SCOREBOARD BULUTANGKIS</h1>

            <div class="score-container">
                <div class="score-box">
                    <h1 id="home_score"></h1>
                    <h6 id="home_team"></h6>
                </div>
                <div class="main-score-box-home">
                    <h1 id="main_home_score"></h1>
                    {{-- <h6 id="home_team"></h6> --}}
                </div>
                <div class="main-score-box">
                    <h1 style="color: yellow" id="game_ball"></h1 style="color: yellow">
                    <h1 style="color:white">VS</h1>
                </div>
                <div class="main-score-box-away">
                    <h1 id="main_away_score"></h1>
                    {{-- <h6 id="home_team"></h6> --}}
                </div>
                <div class="score-box">
                    <h1 id="away_score"></h1>
                    <h6 id="away_team"></h6>
                </div>
            </div>
        </div>

        @foreach ($audio as $audio)
        <audio id="{{ $audio->getFileName() }}" onended="stop_audio()">
            <source src=@php echo '/storage/audio/' .$audio->getFileName();
            @endphp type="audio/mpeg">
        </audio>
        @endforeach

        {{-- Script --}}
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script>
            var source = new EventSource("{{ url('/scoreboard/client/sse') }}");
        </script>
        <script src="{{ asset('/assets/js/scoreboard-client.js') }}"></script>
    </body>
    <!-- ./ Content -->
    @endsection

    @section('js_custom')

    @endsection