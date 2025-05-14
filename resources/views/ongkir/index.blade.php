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

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                // Initialize Select2 for destination
                $('#destination').select2({
                    placeholder: 'Cari tujuan...',
                    ajax: {
                        url: '/destination',
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                search: params.term // Search term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: data.map(item => ({
                                    id: item.id,
                                    text: item.label_name
                                }))
                            };
                        },
                        cache: true
                    }
                });

                // Handle form submission
                $('#form-ongkir').on('submit', function(e) {
                    e.preventDefault();
                    $('#result').html('<p>Loading...</p>');

                    $.ajax({
                        url: '{{ route('get-cost') }}',
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(data) {
                            let output = '<ul>';
                            if (data.length > 0) {
                                data.forEach(item => {
                                    output += `<li>
                                        <strong>${item.name}</strong> (${item.code}) - 
                                        <strong>${item.service}</strong>: 
                                        Rp ${item.cost.toLocaleString()} 
                                        (${item.description})
                                        ${item.etd ? `(estimasi: ${item.etd} hari)` : ''}
                                    </li>`;
                                });
                                output += '</ul>';
                            } else {
                                output = '<p>Data ongkir tidak tersedia.</p>';
                            }
                            $('#result').html(output);
                        },
                        error: function() {
                            $('#result').html('<p>Terjadi kesalahan saat memproses data.</p>');
                        }
                    });
                });
            });
        </script>
        <script>
            $(function() {
                // Province autocomplete
                $.ajax({
                    url: '/provinces',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        const availableProvinces = data.map(function(item) {
                            return {
                                label: item.name,
                                value: item.id
                            };
                        });

                        $("#province_tags").autocomplete({
                            source: availableProvinces,
                            select: function(event, ui) {
                                $("#province_tags").val(ui.item.label);
                                $("#province_id").val(ui.item.value);

                                // Clear and reset regency, district, and village fields
                                $("#regency_tags").val('');
                                $("#regency_id").val('');
                                $("#district_tags").val('');
                                $("#district_id").val('');
                                $("#village_tags").val('');
                                $("#village_id").val('');

                                // Fetch regencies for the selected province
                                fetchRegencies(ui.item.value);

                                return false;
                            }
                        });
                    }
                });

                // Fetch regencies based on province ID
                function fetchRegencies(provinceId) {
                    $.ajax({
                        url: '/regency/' + provinceId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            const availableRegencies = data.map(function(item) {
                                return {
                                    label: item.name,
                                    value: item.id
                                };
                            });

                            $("#regency_tags").autocomplete({
                                source: availableRegencies,
                                select: function(event, ui) {
                                    $("#regency_tags").val(ui.item.label);
                                    $("#regency_id").val(ui.item.value);

                                    // Clear and reset district and village fields
                                    $("#district_tags").val('');
                                    $("#district_id").val('');
                                    $("#village_tags").val('');
                                    $("#village_id").val('');

                                    // Fetch districts for the selected regency
                                    fetchDistricts(ui.item.value);

                                    return false;
                                }
                            });
                        }
                    });
                }

                // Fetch districts based on regency ID
                function fetchDistricts(regencyId) {
                    $.ajax({
                        url: '/district/' + regencyId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            const availableDistricts = data.map(function(item) {
                                return {
                                    label: item.name,
                                    value: item.id
                                };
                            });

                            $("#district_tags").autocomplete({
                                source: availableDistricts,
                                select: function(event, ui) {
                                    $("#district_tags").val(ui.item.label);
                                    $("#district_id").val(ui.item.value);

                                    // Clear and reset village field
                                    $("#village_tags").val('');
                                    $("#village_id").val('');

                                    // Fetch villages for the selected district
                                    fetchVillages(ui.item.value);

                                    return false;
                                }
                            });
                        }
                    });
                }

                // Fetch villages based on district ID
                function fetchVillages(districtId) {
                    $.ajax({
                        url: '/village/' + districtId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            const availableVillages = data.map(function(item) {
                                return {
                                    label: item.name,
                                    value: item.id
                                };
                            });

                            $("#village_tags").autocomplete({
                                source: availableVillages,
                                select: function(event, ui) {
                                    $("#village_tags").val(ui.item.label);
                                    $("#village_id").val(ui.item.value);

                                    return false;
                                }
                            });
                        }
                    });
                }
            });
        </script>
    </div>
</x-app-layout>
