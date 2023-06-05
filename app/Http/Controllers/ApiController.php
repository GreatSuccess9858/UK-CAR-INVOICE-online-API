<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTTP;

class ApiController extends Controller
{
    //
    public function getData(Request $request) {
        $registrationNumber = $request->input('reguisNum');
        $apikey = '90a55893-3635-4941-967e-254415d0bc78';
        $apiEndpoint = 'https://uk1.ukvehicledata.co.uk/api/datapackage/VehicleData';

        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->get($apiEndpoint, [
            'auth_apikey' => $apikey,
            'registrationNumber' => $registrationNumber,
            'api_nullitems' => 1
        ]);

        if ($response->ok()) {
            return $response->json();
        } else {
            throw new Exception('API request failed: ' . $response->status() . ' ' . $response->body());
        }
    }
}
