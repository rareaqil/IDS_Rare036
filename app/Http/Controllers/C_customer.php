<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\D_Customer;
use App\Models\D_Kecamatan;
use App\Models\D_Kelurahan;
use App\Models\D_Kota;
use App\Models\D_Provinsi;

class C_customer extends Controller
{
    public function indexCustomer()
    {
        $customer = DB::table('customer')
        ->join('tbl_kelurahan','customer.id_kelurahan','=','tbl_kelurahan.id_kelurahan')
        ->get();
        $data = array(
            'menu'=> 'customer',
            'submenu'=>'tabel_customer',
            'customer' => $customer
        
        );
        return view('minggu_1/customer',$data);
    }

    public function customerV1()
    {
        $provinsi = D_Provinsi::all();
        $kota = D_Kota::all();
        $kelurahan = D_Kelurahan::all();
        $kecamatan = D_Kecamatan::all();
        $data = array(
            'menu'=> 'customer',
            'submenu'=>'customer_v1'
            
        );
        return view('minggu_1/customer_v1',$data,compact('provinsi','kota','kelurahan','kecamatan'));
    }

    public function insertCustomerV1(Request $post)
    {
        DB::table('customer')->insert([
            'id_customer' => $post->id_cus,
            'nama' => $post->nama,
            'alamat' => $post->alamat,
            'id_kelurahan' => $post->kel,
             'foto' => $post->imagecam,
            // 'file_path' => $post->file_path,
        ]);
        
        // return var_dump($customer);
        return redirect('/customer');

    }

    public function customerV2()
    {
        $provinsi = D_Provinsi::all();
        $kota = D_Kota::all();
        $kelurahan = D_Kelurahan::all();
        $kecamatan = D_Kecamatan::all();
        $data = array(
            'menu'=> 'customer',
            'submenu'=>'customer_v2'
            
        );
        return view('minggu_1/customer_v2',$data,compact('provinsi','kota','kelurahan','kecamatan'));
    }

    public function insertCustomerV2(Request $post)
    {
        $imagecam = str_replace('data:image/png;base64,', '',$post->imagecam);
        $imagecam = str_replace(' ','+',$imagecam);
        $imageName = $post->nama.time().  '.png';
        Storage::disk('local')->put($imageName,base64_decode($imagecam));
        DB::table('customer')->insert([
            'id_customer' => $post->id_cus,
            'nama' => $post->nama,
            'alamat' => $post->alamat,
            'id_kelurahan' => $post->kel,
            //  'foto' => $post->imagecam,
            'file_path' => $imageName
        ]);
        
        // return var_dump($customer);
        return redirect('/customer');

    }


    public function findKota(Request $request)
    {
        $data = D_Kota::select('id_kota', 'nama_kota')
        ->where('id_provinsi',$request->prov_id)
        ->get();
        return response()->json($data);
    }

    public function findKecamatan(Request $request)
    {
        $data = D_Kecamatan::select('id_kecamatan', 'nama_kecamatan')
        ->where('id_kota',$request->kota_id)
        ->get();
        return response()->json($data);
    }

    public function findKelurahan(Request $request)
    {
        $data = D_Kelurahan::select('id_kelurahan', 'nama_kelurahan')
        ->where('id_kecamatan',$request->kec_id)
        ->get();
        return response()->json($data);
    }

    public function findKodepos(Request $request)
    {
        $data = D_Kelurahan::select('id_kelurahan', 'kodepos')
        ->where('id_kelurahan',$request->kel_id)
        ->get();
        return response()->json($data);
    }
}
