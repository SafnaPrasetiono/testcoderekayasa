<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;


class IndexController extends Controller
{
    // show index
    public function index()
    {
        // date_default_timezone_set('Asia/Jakarta');
        $date = Carbon::now();
        $dateurl = $date->isoFormat('YYYY/MM/D');
        $response = Http::get("https://api.myquran.com/v1/sholat/jadwal/1301/" . $dateurl);
        $data = $response->json();
        $jadwal = $data["data"]["jadwal"];
        $tanggal = $date->isoFormat("dddd, D MMMM YYYY");
        unset($jadwal['tanggal'], $jadwal['date'], $jadwal['imsak'], $jadwal['terbit'], $jadwal['dhuha']);
        return view('index', [
            'tanggal' => $tanggal,
            'jadwal' => $jadwal
        ]);
    }
}
