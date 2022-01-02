<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;
use Dompdf\Dompdf;
use App\Models\D_barang;

class C_barang extends Controller
{
    public function indexBarang()
    {
        $barang = DB::table('barang')->get();
        $barang2 = $barang;
        $data = array(
            'menu'=> 'barcode',
            'submenu'=>'barcode',
            'barang' => $barang,
            'barang2' => $barang2
        
        );
        return view('minggu_2/barcode',$data);
    }  

    public function cetakPdf(Request $request)
    {   
        // $row= 1;
        // $col= 1;
        $row= $request->row1;
        $col= $request->col1;
        $panjang=(($row-1)*5)+($col-1);
        $no=1;
        $x=1;
        // $barang = D_barang::whereIn('id_barang',[$request->ids])->get();
        $barang = DB::table('barang')->get();
        $data = array(
            'menu'=> 'barcode',
            'submenu'=>'barcode',
            'barang' => $barang,
            // 'barang1' => $barang1,
            'no' => $no,
            'row' => $row,
            'col' => $col,
            'x' => $x,
            'panjang' => $panjang
        
        );
        $pdf = PDF::loadview('minggu_2/barcode_pdf',compact('barang','data','no','col','row','x','panjang'))->setPaper('A5','potrait');
        // return $pdf->download('laporan-barang-pdf.pdf');
        return $pdf->stream();
    }

    public function cetakPdf1(Request $request)
    {   
        // $row= 1;
        // $col= 1;
        $row= $request->row;
        $col= $request->col;
        $panjang=(($row-1)*5)+($col-1);
        $no=1;
        $x=1;
        $barang = D_barang::whereIn('id_barang',$request->ids)->get();
        
        // $barang = DB::table('barang')->get();
        $data = array(
            'menu'=> 'barcode',
            'submenu'=>'barcode',
            'barang' => $barang,
            // 'barang1' => $barang1,
            'no' => $no,
            'row' => $row,
            'col' => $col,
            'x' => $x,
            'panjang' => $panjang
        
        );
        $pdf = PDF::loadview('minggu_2/barcode_pdf',compact('barang','data','no','col','row','x','panjang'))->setPaper('A5','potrait');
        // return $pdf->download('laporan-barang-pdf.pdf');
        return $pdf->stream();
        // return $request;
    }

    public function cetakPdf2(Request $request){

        return $request;
    }
    
    public function scan()
    {
        $data = array(
            'menu'=> 'barcode',
            'submenu'=>'scan',
        
        );
        return view('minggu_2/scan_barcode',$data);
    }

    public function findBarang(Request $request)
    {
        $data = D_barang::select('*')
        ->where('id_barang',$request->scan_id)
        ->get();
        return response()->json($data);
    }
}
