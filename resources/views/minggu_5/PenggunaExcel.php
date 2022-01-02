<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CustomerExport;
use App\Imports\CustomerImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Pengguna;

class PenggunaExcel extends Controller
{
    public function index(){
        $pengguna = Pengguna::all();
        $data = array(
            // 'menu'=>'pengguna',
            // 'submenu'=>'',
            'Pengguna'=>$pengguna
        );
        return view('excel', $data);
    }

    public function customerExport(){
        return Excel::download(new customerExport, 'customer.xlsx');
    }

    public function customerImport(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataCustomer', $namaFile);

        Excel::import(new customerImport, public_path('/DataCustomer/'.$namaFile));
        return back()->withStatus('import data berhasil');
    }
}
