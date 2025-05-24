<x-app-layout>
    <div class="max-w-7xl mx-auto mt-10 py-10">
        <form action="{{ isset($address) ? route('addresses.update', $address->id) : route('add-address') }}"
            method="post" class="bg-black rounded-lg shadow-md border border-gray-900 p-8">
            @csrf
            @if (isset($address))
                @method('PUT')
            @else
                @method('POST')
            @endif

            <h3 class="text-lg font-semibold text-white mb-6 flex items-center pb-2 border-b border-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-300" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Shipping Address
            </h3>

            <div class="space-y-6">
                <!-- Name and Phone Number -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Name')" class="font-medium text-white" />
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="">
                                <input id="name" type="text" name="name"
                                    class="block w-full mt-1 border-gray-700 bg-gray-900 text-white rounded-md shadow-sm focus:ring-white focus:border-white transition appearance-none"
                                    required placeholder="Enter Name" value="{{ old('name', $address->name ?? '') }}">
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="no_telp" :value="__('Phone Number / WhatsApp')" class="font-medium text-white" />
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="">
                                <input id="no_telp" type="text"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="no_telp"
                                    class="block w-full mt-1 border-gray-700 bg-gray-900 text-white rounded-md shadow-sm focus:ring-white focus:border-white transition appearance-none"
                                    placeholder="Enter Phone Number" required
                                    value="{{ old('no_telp', $address->no_telp ?? '') }}">
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('no_telp')" />
                    </div>
                </div>

                <div class="mb-4">
                    <x-input-label :value="'Country'" class="font-medium text-white mb-2" />
                    <div class="flex gap-4">
                        <label class="inline-flex items-center text-white">
                            <input type="radio" name="country" value="indonesia"
                                class="form-radio text-white bg-gray-800 border-gray-600"
                                {{ old('country', $address->country ?? 'indonesia') == 'indonesia' ? 'checked' : '' }}>
                            <span class="ml-2">Indonesia</span>
                        </label>
                        <label class="inline-flex items-center text-white">
                            <input type="radio" name="country" value="japan"
                                class="form-radio text-white bg-gray-800 border-gray-600"
                                {{ old('country', $address->country ?? '') == 'japan' ? 'checked' : '' }}>
                            <span class="ml-2">Japan</span>
                        </label>
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('country')" />
                </div>
                <div class="mb-4">
                    <x-input-label :value="'Label'" class="font-medium text-white mb-2" />
                    <div class="flex gap-4">
                        <label class="inline-flex items-center text-white">
                            <input type="radio" name="label" value="home"
                                class="form-radio text-white bg-gray-800 border-gray-600"
                                {{ old('label', $address->label ?? '') == 'home' ? 'checked' : '' }}>
                            <span class="ml-2">Home</span>
                        </label>
                        <label class="inline-flex items-center text-white">
                            <input type="radio" name="label" value="office"
                                class="form-radio text-white bg-gray-800 border-gray-600"
                                {{ old('label', $address->label ?? '') == 'office' ? 'checked' : '' }}>
                            <span class="ml-2">Office</span>
                        </label>
                        <label class="inline-flex items-center text-white">
                            <input type="radio" name="label" value="other"
                                class="form-radio text-white bg-gray-800 border-gray-600"
                                {{ old('label', $address->label ?? '') == 'other' ? 'checked' : '' }}>
                            <span class="ml-2">Other</span>
                        </label>
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('label')" />
                </div>

                {{-- Full Address --}}
                <div class="mb-4">
                    <x-input-label for="street" :value="__('Full Address')" class="font-medium text-white" />
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="absolute top-3 left-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <textarea id="street" name="street"
                            class="pl-10 block w-full mt-1 border-gray-700 bg-gray-900 text-white rounded-md shadow-sm focus:ring-white focus:border-white transition"
                            required rows="3">{{ old('street', $address->street ?? '') }}</textarea>
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('street')" />
                </div>

                {{-- Address Details --}}
                <div class="mb-4">
                    <x-input-label for="detail" :value="__('Details')" class="font-medium text-white" />
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="absolute top-3 left-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17V7a2 2 0 012-2h6a2 2 0 012 2v10a2 2 0 01-2 2H9a2 2 0 01-2-2z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17h6m-6 0v2a2 2 0 002 2h6a2 2 0 002-2v-2" />
                            </svg>
                        </div>
                        <input id="detail" name="detail"
                            class="pl-10 block w-full mt-1 border-gray-700 bg-gray-900 text-white rounded-md shadow-sm focus:ring-white focus:border-white transition"
                            value="{{ old('detail', $address->detail ?? '') }}" rows="3" required>
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('detail')" />
                </div>

                <!-- Province and City -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <x-input-label for="province" :value="__('Province')" class="font-medium text-white" />
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                            </div>
                            <div class="ui-widget">
                                <input id="province_tags"
                                    class="pl-10 block w-full mt-1 border-gray-700 bg-gray-900 text-white rounded-md shadow-sm focus:ring-white focus:border-white transition appearance-none"
                                    placeholder="Type province name..." name="province"
                                    value="{{ old('province', $address->province ?? '') }}">
                                <input type="hidden" name="province_id" id="province_id"
                                    value="{{ old('province_id', $address->province_id ?? '') }}">
                            </div>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('province')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="city" :value="__('City/Regency')" class="font-medium text-white" />
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div class="ui-widget">
                                <input id="regency_tags"
                                    class="pl-10 block w-full mt-1 border-gray-700 bg-gray-900 text-white rounded-md shadow-sm focus:ring-white focus:border-white transition appearance-none"
                                    placeholder="Type city/regency name..." name="regency"
                                    value="{{ old('regency', $address->regency ?? '') }}">
                                <input type="hidden" name="regency_id" id="regency_id"
                                    value="{{ old('regency_id', $address->regency_id ?? '') }}">
                            </div>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('regency')" />
                    </div>
                </div>

                <!-- District, Village, and Postal Code -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="mb-4">
                        <x-input-label for="district" :value="__('District')" class="font-medium text-white" />
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                            </div>
                            <div class="ui-widget">
                                <input id="district_tags"
                                    class="pl-10 block w-full mt-1 border-gray-700 bg-gray-900 text-white rounded-md shadow-sm focus:ring-white focus:border-white transition appearance-none"
                                    placeholder="Type district name..." name="district"
                                    value="{{ old('district', $address->district ?? '') }}">
                                <input type="hidden" name="district_id" id="district_id"
                                    value="{{ old('district_id', $address->district_id ?? '') }}">
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('district')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="village" :value="__('Village')" class="font-medium text-white" />
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                            </div>
                            <div class="ui-widget">
                                <input id="village_tags"
                                    class="pl-10 block w-full mt-1 border-gray-700 bg-gray-900 text-white rounded-md shadow-sm focus:ring-white focus:border-white transition appearance-none"
                                    placeholder="Type village name..." name="village"
                                    value="{{ old('village', $address->village ?? '') }}">
                                <input type="hidden" name="village_id" id="village_id"
                                    value="{{ old('village_id', $address->village_id ?? '') }}">
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('village')" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="postal_code" :value="__('Postal Code')" class="font-medium text-white" />
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <x-text-input id="postal_code" name="postal_code" type="text"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" required
                                class="pl-10 block w-full no-spinner border-gray-700 bg-gray-900 text-white focus:ring-white focus:border-white"
                                :value="old('postal_code', $address->postal_code ?? '')" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-4 mt-8">
                <x-primary-button
                    class="px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold transition-colors rounded shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                    </svg>
                    {{ isset($address) ? __('Update') : __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
{{-- new address --}}
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