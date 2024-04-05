<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LuwesApiController extends Controller
{
    public function getDataFromLuwesApi(Request $request)
    {
        $response = Http::asForm()->post('http://data3.luweswatersensor.com:8002/last', [
            'a' => 'stat',
            'imei' => '869556066072316'
        ]);

        $data = $response->json(); // Ambil respons dalam bentuk array JSON

        return $data;
    }
}
