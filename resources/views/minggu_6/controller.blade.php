@extends('layout.mainlayout')
@section('Scoreboard', 'Bissmillah')

@section('css_custom')
<!-- CUSTOM CSS -->
<link rel="stylesheet" href="{{ asset('/assets/css/scoreboard-controller.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Scoreboard </li>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="page-header">
    <h4 style="text-align: center">Scoreboard Controller Bulutangkis</h4>
    <hr>
</div>

<div class="row">
    <div class="col-md-12">

        <form id="team_form" class="d-flex justify-content-center ">


            <div class="form-row">
                <div class="col">
                    <label>Home</label>
                    <input type="text" id="input_home_team" class="form-control" required>
                </div>
                <div class="col">
                    <label>Away</label>
                    <input type="text" id="input_away_team" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-dark">
                    UPDATE
                </button>

            </div>
        </form>
        <hr>
        <div class="d-flex justify-content-center mt-5">
            <h5 class="card-title">
                ============================ Score ============================ </h5>
        </div>
        <div class="score-container">
            <div class="score-value">
                <h1 id="home_score">0</h1>
                <h6 id="home_team">Home</h6>
            </div>
            <div class="score-value">
                <h1 id="main_home_score">0</h1>
                <h6>Game Point
                </h6>
            </div>
            <div class="score-value">
                <h1 id="game_ball"></h1>
                <h1>VS</h1>
            </div>
            <div class="score-value">
                <h1 id="main_away_score">0</h1>
                <h6>Game Point
                </h6>
            </div>
            <div class="score-value">
                <h1 id="away_score">0</h1>
                <h6 id="away_team">Away</h6>
            </div>
        </div>
        <hr>
        <div class="score-value-control-container mt-5">
            <p>================================ Game Ball ================================</p>
            <div class="row mt-4">
                <div class="col">
                    <button id="home_ball" class="btn btn-sm btn-primary">
                        Home Ball
                    </button>
                </div>

                <div class="col">
                    <button id="reset_ball" class="btn btn-sm btn-dark">
                        RESET BALL
                    </button>
                </div>
                <div class="col">
                    <button id="away_ball" class="btn btn-sm btn-danger">
                        Away Ball
                    </button>
                </div>
            </div>
            <hr>
            <p>================================ Score Point ================================</p>
            <div class="row mt-4">
                <div class="col">
                    <button id="home_plus_one_button" class="btn btn-sm btn-primary">
                        +1 Home
                    </button>
                </div>
                <div class="col">
                    <button id="home_minus_one_button" class="btn btn-sm btn-primary">
                        -1 Home
                    </button>
                </div>
                <div class="col">
                    <button id="away_plus_one_button" class="btn btn-sm btn-danger">
                        +1 <br>Away
                    </button>
                </div>
                <div class="col">
                    <button id="away_minus_one_button" class="btn btn-sm btn-danger">
                        -1 <br>Away
                    </button>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <button id="reset_score_button" class="btn btn-sm btn-dark">
                    RESET SCORE
                </button>
            </div>
            <p> ================================ Game
                Point ================================
            </p>
            <div class="row mt-2">
                <div class="col">
                    <button id="main_home_plus_one_button" class="btn btn-sm btn-primary">
                        +1 <br>Home Point
                    </button>
                </div>
                <div class="col">
                    <button id="main_home_minus_one_button" class="btn btn-sm btn-primary">
                        -1 <br>Home Point
                    </button>
                </div>
                <div class="col">
                    <button id="main_away_plus_one_button" class="btn btn-sm btn-danger">
                        +1 <br>Away Point
                    </button>
                </div>
                <div class="col">
                    <button id="main_away_minus_one_button" class="btn btn-sm btn-danger">
                        -1 <br>Away Point
                    </button>
                </div>
            </div>
            {{-- <div class="row mt-2">
                <div class="col">
                    <button id="home_plus_three_button" class="btn btn-sm btn-primary">
                        +3 Home
                    </button>
                </div>
                <div class="col">
                    <button id="home_minus_three_button" class="btn btn-sm btn-primary">
                        -3 Home
                    </button>
                </div>
                <div class="col">
                    <button id="away_plus_three_button" class="btn btn-sm btn-danger">
                        +3 Away
                    </button>
                </div>
                <div class="col">
                    <button id="away_minus_three_button" class="btn btn-sm btn-danger">
                        -3 Away
                    </button>
                </div>
            </div> --}}
        </div>

        <div class="d-flex justify-content-center mt-5">
            <button id="reset_button" class="btn btn-sm btn-dark">
                RESET ALL
            </button>
        </div>

        {{-- <div class="d-flex justify-content-center mt-5">
            <h5 class="card-title">
                <===== Countdown=====>
            </h5>
        </div>

        <div class="form-inline my-3 d-flex justify-content-center">
            <div class="form-group">
                <input type="number" id="input_timer" min="0" class="form-control" placeholder="timer (seconds)">
            </div>
            <button id="start_timer_button" class="btn btn-linkedin mx-1 my-1">
                START
            </button>
            <button id="pause_timer_button" class="btn btn-google mx-1 my-1">
                PAUSE
            </button>
            <button id="resume_timer_button" class="btn btn-warning mx-1 my-1">
                RESUME
            </button>
        </div> --}}
        <hr>
        <div class="d-flex justify-content-center mt-5">
            <h5 class="card-title">
                ================================ Music ================================
            </h5>
        </div>

        <div class="d-flex justify-content-center form-inline my-4">
            <div class="form-group">
                <label class="mr-3">Select Song</label>
                <select id="select_audio" class="form-control">
                    <option value="Badminton.mp3">Badminton</option>
                    <option value="Applause.mp3">Applause</option>
                </select>
            </div>
            <button id="play_audio_button" class="btn btn-linkedin mx-1 my-1">
                <i class="fas fa-play-circle mr-2"></i>
                PLAY
            </button>
            <button id="pause_audio_button" class="btn btn-warning mx-1 my-1">
                <i class="fas fa-pause-circle mr-2"></i>
                PAUSE
            </button>
            <button id="stop_audio_button" class="btn btn-youtube mx-1 my-1">
                <i class="fas fa-stop-circle mr-2"></i>
                STOP
            </button>
        </div>

    </div>
    <hr>
</div>
<hr>
</div>
<!-- ./ Content -->

@endsection

@section('js_custom')
<!-- CUSTOM JS -->
<script>
    var source = new EventSource("{{ url('/scoreboard/client/sse') }}");
</script>
<script src="{{ asset('/assets/js/scoreboard-controller.js') }}"></script>

@endsection