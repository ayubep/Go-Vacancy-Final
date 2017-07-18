<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Packet;

class MainController extends Controller
{
    public function index()
    {
        $packets = Packet::all();
        $packetss = null;
        return view('main.index',['packets' => $packets,'packetss'=>$packetss]);

    }
}