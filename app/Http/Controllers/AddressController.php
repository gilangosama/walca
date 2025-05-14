<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Provinces;
use App\Models\Regency;
use App\Models\Village;

class AddressController extends Controller
{
    public function getProvinces() {
        $provinces = Provinces::all();
        return response()->json($provinces);
    }

    public function getRegency($provinceId) {
        $regency = Regency::where('province_id', $provinceId)->get();
        return response()->json($regency);
    }

    public function getDistrict($regencyId) {
        $district = District::where('regency_id', $regencyId)->get();
        return response()->json($district);
    }

    public function getVillage($districtId) {
        $villages = Village::where('district_id', $districtId)->get();
        return response()->json($villages);
    }
}
