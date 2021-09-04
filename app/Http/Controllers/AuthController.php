<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me(){
        return[ 
            'Status' => '200',
            'Message' => 'Success',
            'Nama' => 'Maruf Salaffudin',
            'Kelas' => 'XII RPL 4',
            'Absen' => '01',
            'TTL' => 'Wonosobo, 20 Januari 2004'
        ];
    }
}
