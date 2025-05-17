<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Provinces;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getProvinces()
    {
        $provinces = Provinces::all();
        return response()->json($provinces);
    }

    public function getRegency($provinceId)
    {
        $regency = Regency::where('province_id', $provinceId)->get();
        return response()->json($regency);
    }

    public function getDistrict($regencyId)
    {
        $district = District::where('regency_id', $regencyId)->get();
        return response()->json($district);
    }

    public function getVillage($districtId)
    {
        $villages = Village::where('district_id', $districtId)->get();
        return response()->json($villages);
    }

    public function addAddress(Request $request)
    {   
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'no_telp' => 'required|numeric',
            'label' => 'required|string|in:rumah,kantor,lainnya',
            'street' => 'required|string|max:255',
            'detail' => 'nullable|string|max:255',
            'province_id' => 'required|exists:provinces,id',
            'regency_id' => 'required|exists:regencies,id',
            'district_id' => 'required|exists:districts,id',
            'village_id' => 'required|exists:villages,id',
            'postal_code' => 'required|string|max:10',
        ]);
        
        dd($validated);

        Address::create([
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'no_telp' => $validated['no_telp'],
            'label' => $validated['label'],
            'country' => 'indonesia',
            'street' => $validated['street'],
            'detail' => $validated['detail'],
            'provinces' => $validated['province_id'],
            'regency' => $validated['regency_id'],
            'district' => $validated['district_id'],
            'village' => $validated['village_id'],
            'postal_code' => $validated['postal_code'],
        ]);

        return redirect()->back()->with('status', 'Alamat berhasil ditambahkan.');
    }
}
