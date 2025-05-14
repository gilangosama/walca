<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RajaOngkirService;

class OngkirController extends Controller
{
    protected $rajaOngkir;

    public function __construct(RajaOngkirService $rajaOngkir)
    {
        $this->rajaOngkir = $rajaOngkir;
    }

    public function index()
    {
        return view('ongkir.index');
    }

    public function getDestination(Request $request)
    {
        $destination = $request->search;
        return response()->json($this->rajaOngkir->getDestination($destination));
    }

    public function getCities($provinceId)
    {
        return response()->json($this->rajaOngkir->getCities($provinceId));
    }

    public function getDistrict($provinceId)
    {
        return response()->json($this->rajaOngkir->getDistrict($provinceId));
    }

    public function getSubdistrict($provinceId)
    {
        return response()->json($this->rajaOngkir->getSubdistrict($provinceId));
    }

    public function getCost(Request $request)
    {
        $validated = $request->validate([
            'origin' => 'required|numeric',
            'destination' => 'required|numeric',
            'weight' => 'required|numeric|min:1',
            'courier' => 'required|string',
        ]);

        $result = $this->rajaOngkir->getCost(
            $validated['origin'],
            $validated['destination'],
            $validated['weight'],
            $validated['courier']
        );

        return response()->json($result);
    }
}
