<x-app-layout>
    <div class="container mx-auto">

        <h2>Cek Ongkir</h2>
        <div class="mt-20 mb-5">
            <form id="form-ongkir">
                @csrf
                <label for="origin">Asal (ID Kota):</label>
                <input type="number" id="origin" name="origin" value="43179" required><br><br>

                <label for="destination">Tujuan (ID Kota):</label>
                <select id="destination" name="destination" style="width: 100%;" required></select><br><br>

                <label for="weight">Berat (gram):</label>
                <input type="number" id="weight" name="weight" value="1700" required><br><br>

                <label for="courier">Kurir:</label>
                <input type="text" id="courier" name="courier" value="jne:sicepat:jnt" required><br><br>

                <button type="submit">Cek Ongkir</button>
            </form>
        </div>

        <h2>Hasil Ongkir</h2>
        <div id="result">
            <p>Data ongkir akan ditampilkan di sini.</p>
        </div>

        {{-- masukan alamat --}}
        <h2>Tambah Alamat</h2>
        <form action="add-address">
            <div class="ui-widget">
                <label for="province_tags">Provinsi: </label>
                <input id="province_tags" placeholder="Ketik nama provinsi...">
                <input type="hidden" name="province_id" id="province_id">
            </div>
            <div class="ui-widget mt-4">
                <label for="regency_tags">Kota/Kabupaten: </label>
                <input id="regency_tags" placeholder="Ketik nama kota/kabupaten...">
                <input type="hidden" name="regency_id" id="regency_id">
            </div>
            <div class="ui-widget mt-4">
                <label for="district_tags">Kecamatan: </label>
                <input id="district_tags" placeholder="Ketik nama kecamatan...">
                <input type="hidden" name="district_id" id="district_id">
            </div>
            <div class="ui-widget mt-4">
                <label for="village_tags">Kelurahan/Desa: </label>
                <input id="village_tags" placeholder="Ketik nama kelurahan/desa...">
                <input type="hidden" name="village_id" id="village_id">
            </div>

        </form>

    </div>
</x-app-layout>
