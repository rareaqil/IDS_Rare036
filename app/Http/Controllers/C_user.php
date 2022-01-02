<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_user extends Controller
{
    public function welcome()
    {
        $data = array(
            'menu'=> 'home',
            'submenu'=>''
        
        );
        return view('welcome',$data);
    }
}
