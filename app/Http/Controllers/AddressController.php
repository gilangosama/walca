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
        // dd($request->all());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'no_telp' => 'required|numeric',
            'label' => 'required|string',
            'street' => 'required|string|max:255',
            'detail' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'regency' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ]);

        // dd($validated);

        Address::create([
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'no_telp' => $validated['no_telp'],
            'label' => $validated['label'],
            'country' => 'indonesia',
            'street' => $validated['street'],
            'detail' => $validated['detail'],
            'province' => $validated['province'],
            'regency' => $validated['regency'],
            'district' => $validated['district'],
            'village' => $validated['village'],
            'postal_code' => $validated['postal_code'],
        ]);

        return redirect()->back()->with('status', 'Alamat berhasil ditambahkan.');
    }

    public function editAddress(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'no_telp' => 'required|numeric',
            'label' => 'required|string',
            'street' => 'required|string|max:255',
            'detail' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'regency' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ]);
        $address = Address::findOrFail($id);
        // dump($address);

        $address->update([
            // 'user_id' => auth()->id(),
            'name' => $validated['name'],
            'no_telp' => $validated['no_telp'],
            'label' => $validated['label'],
            'country' => 'indonesia',
            'street' => $validated['street'],
            'detail' => $validated['detail'],
            'province' => $validated['province'],
            'regency' => $validated['regency'],
            'district' => $validated['district'],
            'village' => $validated['village'],
            'postal_code' => $validated['postal_code'],
        ]);
        // dd($address);
        return redirect()->back()->with('status', 'Alamat berhasil di update.');
    }

    public function deleteAddress($id)
    {
        $address = Address::findOrFail($id);
        // dd($address);
        $address->delete();

        return redirect()->back()->with('status', 'Alamat berhasil dihapus.');
    }
}
