<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\D_toko;

class C_toko extends Controller
{
    public function indexToko()
    {
        $toko = DB::table('lokasi_toko')->get();
        $data = array(
            'menu'=> 'toko',
            'submenu'=>'tabel_toko',
            'toko' => $toko
        
        );
        return view('minggu_3/kunjungan',$data);
    }

    public function tambahToko()
    {
        $data = array(
            'menu'=> 'toko',
            'submenu'=>'tabel_toko'
            
        );
        return view('minggu_3/tambah_toko',$data);
    }

    public function tambahKunjungan()
    {
        $data = array(
            'menu'=> 'toko',
            'submenu'=>'tambah_kunjungan'
            
        );
        return view('minggu_3/tambah_kunjungan',$data);
    }

    public function insertToko(Request $post)
    {
        DB::table('lokasi_toko')->insert([
            'barcode' => $post->barcode,
            'nama_toko' => $post->nama_toko,
            'latitude' => $post->latitude,
            'longitude' => $post->longitude,
            'accuracy' => $post->accuracy
           
        ]);
        
        // return var_dump($customer);
        return redirect('/toko');

    }

    public function findToko(Request $request)
    {
        $data = D_toko::select('*')
        ->where('barcode',$request->scan_id)
        ->get();
        return response()->json($data);
    }
}
