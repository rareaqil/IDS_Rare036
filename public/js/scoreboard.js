$(document).ready(function() {

    const menu = document.getElementById("scoreboard");
    menu.classList.add("active"); 

    // SCOREBOARD
    // Home Score
    $('.home_score_plus').on('click', function(){
        let score = document.getElementById('home_score').innerHTML;
        // console.log(score);
        if(score >= 0){
            document.getElementById('home_score').innerHTML = parseInt(score) + 1;
        }
    });

    $('.home_score_min').on('click', function(){
        let score = document.getElementById('home_score').innerHTML;
        if(score > 0){
            document.getElementById('home_score').innerHTML = parseInt(score) - 1;
        }
    });

    // Away Score
    $('.away_score_plus').on('click', function(){
        let score = document.getElementById('away_score').innerHTML;
        if(score >= 0){
            document.getElementById('away_score').innerHTML = parseInt(score) + 1;
        }
    });

    $('.away_score_min').on('click', function(){
        let score = document.getElementById('away_score').innerHTML;
        if(score > 0){
            document.getElementById('away_score').innerHTML = parseInt(score) - 1;
        }
    });

    // Home Foul
    $('.home_foul_plus').on('click', function(){
        let foul = document.getElementById('home_foul').innerHTML;
        if(foul >= 0 && foul < 6){
            document.getElementById('home_foul').innerHTML = parseInt(foul) + 1;
        }
    });

    $('.home_foul_min').on('click', function(){
        let foul = document.getElementById('home_foul').innerHTML;
        if(foul > 0){
            document.getElementById('home_foul').innerHTML = parseInt(foul) - 1;
        }
    });

    $('.home_foul_reset').on('click', function(){
        if(document.getElementById('home_foul').innerHTML != 0){
            document.getElementById('home_foul').innerHTML = 0;
        }
        
    });

    // Away Foul
    $('.away_foul_plus').on('click', function(){
        let foul = document.getElementById('away_foul').innerHTML;
        if(foul >= 0 && foul < 6){
            document.getElementById('away_foul').innerHTML = parseInt(foul) + 1;
        }
    });

    $('.away_foul_min').on('click', function(){
        let foul = document.getElementById('away_foul').innerHTML;
        if(foul > 0){
            document.getElementById('away_foul').innerHTML = parseInt(foul) - 1;
        }
    });

    $('.away_foul_reset').on('click', function(){
        if(document.getElementById('away_foul').innerHTML != 0){
            document.getElementById('away_foul').innerHTML = 0;
        }
    });

    // Period
    $('.min_period').on('click', function(){
        let period = document.getElementById('period').innerHTML;
        if(period > 1){
            period = 1;
        }
        document.getElementById('period').innerHTML = period;
    });

    $('.plus_period').on('click', function(){
        let period = document.getElementById('period').innerHTML;
        if(period < 2){
            period = 2;
        }
        document.getElementById('period').innerHTML = period;
    });

    // CONTROL
    // Reset Scoreboard
    $('.reset_scoreboard').on('click', function(){
        document.getElementById('home_score').innerHTML = 0;
        document.getElementById('away_score').innerHTML = 0;
        document.getElementById('home_foul').innerHTML = 0;
        document.getElementById('away_foul').innerHTML = 0;
        document.getElementById('main_home_score').innerHTML = 0;
        document.getElementById('main_away_score').innerHTML = 0;
        document.getElementById('home').value = "";
        document.getElementById('away').value = "";
    });

    // Update Scoreboard
    $(document).on('click','.update',function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var id = 1;

        let home_score = document.getElementById('home_score').innerHTML;
        let away_score = document.getElementById('away_score').innerHTML;
        let main_home_score = document.getElementById('main_home_score').innerHTML;
        let main_away_score = document.getElementById('main_away_score').innerHTML;
        let home_foul = document.getElementById('home_foul').innerHTML;
        let away_foul = document.getElementById('away_foul').innerHTML;
        let home = document.getElementById('home').value;
        let away = document.getElementById('away').value;
        let period = document.getElementById('period').innerHTML;

        $.ajax({
            type: 'POST',
            url: '/scoreboard-controller/update',
            data: {
                _token: token,
                id : id,
                home : home,
                away : away,
                home_score : home_score,
                away_score : away_score,
                main_home_score : main_home_score,
                main_away_score : main_away_score,
                home_foul : home_foul,
                away_foul : away_foul,
                period : period
            },
        });
    });

    // Count Down
    $(document).on('click','.start',function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var id = 1;

        let countdown = 1;

        $.ajax({
            type: 'POST',
            url: '/scoreboard-controller/update',
            data: {
                _token: token,
                id : id,
                countdown : countdown
            },
        });
    });

    $(document).on('click','.stop',function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var id = 1;

        let countdown = 0;

        $.ajax({
            type: 'POST',
            url: '/scoreboard-controller/update',
            data: {
                _token: token,
                id : id,
                countdown : countdown
            },
        });
    });

    $(document).on('click','.reset_timer',function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var id = 1;

        let countdown = 3;

        $.ajax({
            type: 'POST',
            url: '/scoreboard-controller/update',
            data: {
                _token: token,
                id : id,
                countdown : countdown
            },
        });
    });

    // Audio
    $(document).on('click','.sound1',function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var id = 1;

        let aud = 1;
        let status = document.getElementById('sound_status').value;

        if(status == 0){
            status = 1
            document.getElementById('sound_status').value = 1;
        }
        else{
            status = 0;
            document.getElementById('sound_status').value = 0;
        }

        $.ajax({
            type: 'POST',
            url: '/scoreboard-controller/update',
            data: {
                _token: token,
                id : id,
                id_sound : aud,
                status : status
            },
        });
    });

    $(document).on('click','.sound2',function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var id = 1;

        let aud = 2;
        let status = document.getElementById('sound_status').value;

        if(status == 0){
            status = 1
            document.getElementById('sound_status').value = 1;
        }
        else{
            status = 0;
            document.getElementById('sound_status').value = 0;
        }

        $.ajax({
            type: 'POST',
            url: '/scoreboard-controller/update',
            data: {
                _token: token,
                id : id,
                id_sound : aud,
                status : status
            },
        });
    });

    $(document).on('click','.sound3',function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var id = 1;

        let aud = 3;
        let status = document.getElementById('sound_status').value;

        if(status == 0){
            status = 1
            document.getElementById('sound_status').value = 1;
        }
        else{
            status = 0;
            document.getElementById('sound_status').value = 0;
        }

        $.ajax({
            type: 'POST',
            url: '/scoreboard-controller/update',
            data: {
                _token: token,
                id : id,
                id_sound : aud,
                status : status
            },
        });
    });
});
