@extends('layout.mainlayout')
@section('Scan Barcode', 'Bissmillah')

@section('css_custom')
    <zxing-scanner [tryHarder]="true" [formats]="formats" (scanSuccess)="onScanSuccessHandler($event)"></zxing-scanner>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Barcode</a></li>
<li class="breadcrumb-item active">Scan Barcode</li>
@endsection

@section('content')
   
<section class="container" id="demo-content">
      <h1 class="title">Scan Code from Video Camera</h1>

      <div>
        <a class="btn btn-primary" id="startButton">Start</a>
        <a class="btn btn-success" id="resetButton">Reset</a>
      </div>
<br>
      <div>
        <video id="video" width="300" height="200" style="border: 1px solid gray"></video>
      </div>

      <div id="sourceSelectPanel" style="display:none">
        <label for="sourceSelect">Change video source:</label>
        <select class="form-control" id="sourceSelect" style="max-width:400px">
        </select>
      </div>

      <label>Result:</label>
        <code class="form-control" style="width:400px" name="result" id="result"></code>
        <br>
        <input href="findBarang" class="btn btn-primary" type="button" id="barangdd" name="barangdd" value="Details"><br>
        <label>Keterangan:</label>
        <p type="text" class="form-control" style="width:400px" name="ketdd" id="ketdd"></p><br>
    </section>
    
@endsection

@section('js_custom')
<!-- JS CUSTOM -->
<!-- Kamera -->
<script type="text/javascript" src="https://unpkg.com/@zxing/library@0.18.3-dev.7656630/umd/index.js"></script>
  <script type="text/javascript">
    window.addEventListener('load', function () {
      let selectedDeviceId;
      const codeReader = new ZXing.BrowserMultiFormatReader()
      console.log('ZXing code reader initialized')
      codeReader.listVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect')
          selectedDeviceId = videoInputDevices[0].deviceId
          if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => {
              const sourceOption = document.createElement('option')
              sourceOption.text = element.label
              sourceOption.value = element.deviceId
              sourceSelect.appendChild(sourceOption)
            })

            sourceSelect.onchange = () => {
              selectedDeviceId = sourceSelect.value;
            };

            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
          }

          document.getElementById('startButton').addEventListener('click', () => {
            codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
              if (result) {
                console.log(result)
                document.getElementById('result').textContent = result.text
              }
              if (err && !(err instanceof ZXing.NotFoundException)) {
                console.error(err)
                document.getElementById('result').textContent = err
              }
            })
            console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
          })

          document.getElementById('resetButton').addEventListener('click', () => {
            codeReader.reset()
            document.getElementById('result').textContent = '';
            console.log('Reset.')
          })

        })
        .catch((err) => {
          console.error(err)
        })
    })
  </script>

<!-- Ajax Ambil Data dari Barcode -->
  <!-- <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script> -->
  <!-- <script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>   -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  -->
  <script>
    $("#barangdd").click(function(){
    var scan_id = document.querySelector('code').innerHTML; // find <code> tag and get text
    // var scan_id = console.log(val);  
    // element.innerText = console.log(val);
    $.ajax({
      type:"get",
      url:"findBarang",
      data:"scan_id="+scan_id,
      success:function(data){
        console.log(scan_id);
        for(var i=0;i<data.length;i++){
          // $('#ket').append('<label value="'+data[i].id_barang+'">'+data[i].ny
          document.getElementById("ketdd").innerHTML = data[i].nama;
        }
        // console.log(test);
        // document.getElementById("ketdd").innerHTML = '+data[i].nama+';
        // document.getElementById('ketdd').innerHTML = data.id_barang , data.nama;
        // $('#ketdd').html(data.nama);
      }
      });
  });
  </script>
@endsection