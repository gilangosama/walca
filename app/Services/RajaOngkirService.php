<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RajaOngkirService
{
    protected $key;
    protected $baseUrl;

    public function __construct()
    {
        $this->key = env('RAJAONGKIR_API_KEY');
        $this->baseUrl = 'https://rajaongkir.komerce.id/api/v1';
    }

    public function getDestination($search)
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'key' => $this->key,
        ])->get("{$this->baseUrl}/destination/domestic-destination", [
            'search' => $search,
            'limit' => 10,
            'offset' => 0,
        ]);

        $result = $response->json();

        if (!isset($result['data'])) {
            return ['message' => 'Data tidak tersedia'];
        }

        dd($result);

        return collect($result['data'])
            ->pluck('label_name')
            ->unique()
            ->sort()
            ->values();
    }

    public function getCities($provinceId)
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'key' => $this->key,
        ])->get("{$this->baseUrl}/destination/domestic-destination", [
            'province_id' => $provinceId,
        ]);

        $result = $response->json();

        if (!isset($result['data'])) {
            return ['message' => 'Data tidak tersedia'];
        }

        return collect($result['data'])
            ->pluck('city_name', 'city_id')
            ->unique()
            ->sort()
            ->values();
    }

    public function getDistrict($provinceId)
    {
        // Similar implementation as getCities, but plucking 'district_name'
    }

    public function getSubdistrict($provinceId)
    {
        // Similar implementation as getCities, but plucking 'subdistrict_name'
    }

    public function getCost($origin, $destination, $weight, $courier)
    {
        // dd($origin);
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'key' => $this->key,
        ])->post('https://rajaongkir.komerce.id/api/v1/calculate/domestic-cost?' . http_build_query([
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier,
        ]));
        
        $result = $response->json();

        if (!isset($result['data'])) {
            return ['message' => 'Data tidak tersedia'];
        }

        return $result['data'];
    }
}
