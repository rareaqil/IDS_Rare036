<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CustomerExport;
use App\Imports\CustomerImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\M_pengguna;


class C_pengguna extends Controller {
    public function index(){
        $pengguna = M_pengguna::all();
        $data = array(
            'menu'=>'pengguna',
            'submenu'=>'',
            'pengguna'=>$pengguna
        );
        return view('pengguna', $data);
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
