<!DOCTYPE html>
<html>
<style>
    td {
        padding: 5px;
    }
    div {
        height: 68,03149606299213px;
        weight: 124,7244094488189px;
    }
    p{
        margin-top: -1px;
        font-size: 12;
    }
    br{
        margin-top: -100px;
    }
    </style>
<body>  
   
        <!-- <h6>{{$col}}</h6> -->
        <!-- <h6>{{$row}}</h6> -->
<table>

    
    <tr>
    @foreach (range(0,$panjang) as $key)
    @if($x++ <= $panjang)
    <td>
        <div style="clear: both;"></div>
    </td>
    @if($no++ % 5 == 0)
    </tr><tr> 
    @endif  
    @else
    @foreach ($barang as $key)
        <td>
            <div class="container">
                <center>
                    <?php
                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($key->id_barang, $generator::TYPE_CODE_128,  $widthFactor = 1.5, $height = 30,)) . '">';
                ?>
                <p><?= $key->id_barang?>
                <br>
                <?=$key->nama?>
                </p> 
            </center>
        </div>
    </td>
    @if($no++ % 5 == 0)
    </tr><tr>
    @endif
    @endforeach
    @endif
    @endforeach
   
    
</table>       

 
</body>
</html>