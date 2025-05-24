<section>
    <header class="mb-6">
        <h2 class="text-xl font-bold text-gray-900 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Basic Information -->
        <div
            class="p-6 bg-white rounded-lg shadow-sm border border-gray-100 transition-all duration-200 hover:shadow-md">
            <h3 class="text-md font-semibold text-gray-800 mb-4 pb-2 border-b">Informasi Dasar</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="relative">
                    <x-input-label for="name" :value="__('Name')" class="font-medium text-gray-700" />
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <x-text-input id="name" name="name" type="text" class="pl-10 block w-full"
                            :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div class="relative">
                    <x-input-label for="email" :value="__('Email')" class="font-medium text-gray-700" />
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <x-text-input id="email" name="email" type="email" class="pl-10 block w-full"
                            :value="old('email', $user->email)" required autocomplete="username" />
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-4 mt-6">
            <x-primary-button
                @click="window.location.href='{{ route('create-address') }}'">{{ __('New Address') }}</x-primary-button>
        </div>

        <!-- Address List -->
        @if (isset($user) && $user->address && $user->address->count())
            <div
                class="p-6 bg-white rounded-lg shadow-sm border border-gray-100 transition-all duration-200 hover:shadow-md mt-6">
                <h3 class="text-md font-semibold text-gray-800 mb-4 pb-2 border-b flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ __('Your addresses') }}
                </h3>
                <div class="space-y-4">
                    @foreach ($user->address as $address)
                        <div
                            class="p-4 border rounded flex flex-col md:flex-row md:items-center md:justify-between gap-2 bg-gray-50">
                            <div>
                                <div class="font-semibold text-gray-800">
                                    {{ $address->name }} <span
                                        class="text-xs text-gray-500">({{ ucfirst($address->label) }})</span>
                                </div>
                                <div class="text-sm text-gray-600">
                                    {{ $address->street }}, {{ $address->village }}, {{ $address->district }},
                                    {{ $address->regency }}, {{ $address->province }}, {{ $address->postal_code }}
                                </div>
                                <div class="text-xs text-gray-500">
                                    {{ $address->country == 'indonesia' ? 'Indonesia' : 'Japan' }} |
                                    {{ $address->no_telp }}
                                </div>
                                @if ($address->detail)
                                    <div class="text-xs text-gray-400 italic">
                                        {{ $address->detail }}
                                    </div>
                                @endif
                            </div>
                            <div class="flex gap-2 mt-2 md:mt-0">
                                <x-secondary-button class="text-xs px-3 py-2" x-data
                                    @click="window.location.href='{{ route('edit-address', $address->id) }}'">
                                    {{ __('Edit') }}
                                </x-secondary-button>
                                <x-danger-button x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-address-deletion-{{ $address->id }}')">{{ __('Delete') }}</x-danger-button>

                                <x-modal name="confirm-address-deletion-{{ $address->id }}" :show="$errors->userDeletion->isNotEmpty()"
                                    focusable>
                                    <form method="post" action="{{ route('delete-address', $address->id) }}"
                                        class="p-6">
                                        @csrf
                                        @method('delete')

                                        <h2 class="text-lg font-medium text-gray-900">
                                            {{ __('Are you sure you want to delete your address?') }}
                                        </h2>

                                        <p class="mt-1 text-sm text-gray-600">
                                            {{ __('Once you delete this address, it cannot be recovered. Are you sure you want to permanently remove this address from your profile?') }}
                                        </p>

                                        <div class="mt-6 flex justify-end">
                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Cancel') }}
                                            </x-secondary-button>

                                            <x-danger-button class="ms-3">
                                                {{ __('Delete Account') }}
                                            </x-danger-button>
                                        </div>
                                    </form>
                                </x-modal>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="flex items-center justify-end gap-4 mt-6">
            <div class="flex-grow">
                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 bg-green-50 px-3 py-2 rounded-md border border-green-200 inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-green-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                        {{ __('Saved.') }}
                    </p>
                @endif
            </div>

            <x-primary-button class="px-6 py-3 bg-black hover:bg-gray-800 transition-colors rounded shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                </svg>
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 bg-green-50 px-3 py-2 rounded-md border border-green-200 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-green-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>

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

{{-- edit address --}}
<script>
    $(function() {
        @if (isset($user) && $user->address && $user->address->count())
            @foreach ($user->address as $address)
                // Province autocomplete for edit modal
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

                        $("#province_tags_{{ $address->id }}").autocomplete({
                            source: availableProvinces,
                            select: function(event, ui) {
                                $("#province_tags_{{ $address->id }}").val(ui.item
                                    .label);
                                $("#province_id_{{ $address->id }}").val(ui.item
                                    .value);

                                // Clear and reset regency, district, and village fields
                                $("#regency_tags_{{ $address->id }}").val('');
                                $("#regency_id_{{ $address->id }}").val('');
                                $("#district_tags_{{ $address->id }}").val('');
                                $("#district_id_{{ $address->id }}").val('');
                                $("#village_tags_{{ $address->id }}").val('');
                                $("#village_id_{{ $address->id }}").val('');

                                // Fetch regencies for the selected province
                                fetchRegencies_{{ $address->id }}(ui.item.value);

                                return false;
                            }
                        });
                    }
                });

                function fetchRegencies_{{ $address->id }}(provinceId) {
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

                            $("#regency_tags_{{ $address->id }}").autocomplete({
                                source: availableRegencies,
                                select: function(event, ui) {
                                    $("#regency_tags_{{ $address->id }}").val(ui.item
                                        .label);
                                    $("#regency_id_{{ $address->id }}").val(ui.item
                                        .value);

                                    // Clear and reset district and village fields
                                    $("#district_tags_{{ $address->id }}").val('');
                                    $("#district_id_{{ $address->id }}").val('');
                                    $("#village_tags_{{ $address->id }}").val('');
                                    $("#village_id_{{ $address->id }}").val('');

                                    // Fetch districts for the selected regency
                                    fetchDistricts_{{ $address->id }}(ui.item.value);

                                    return false;
                                }
                            });
                        }
                    });
                }

                function fetchDistricts_{{ $address->id }}(regencyId) {
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

                            $("#district_tags_{{ $address->id }}").autocomplete({
                                source: availableDistricts,
                                select: function(event, ui) {
                                    $("#district_tags_{{ $address->id }}").val(ui.item
                                        .label);
                                    $("#district_id_{{ $address->id }}").val(ui.item
                                        .value);

                                    // Clear and reset village field
                                    $("#village_tags_{{ $address->id }}").val('');
                                    $("#village_id_{{ $address->id }}").val('');

                                    // Fetch villages for the selected district
                                    fetchVillages_{{ $address->id }}(ui.item.value);

                                    return false;
                                }
                            });
                        }
                    });
                }

                function fetchVillages_{{ $address->id }}(districtId) {
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

                            $("#village_tags_{{ $address->id }}").autocomplete({
                                source: availableVillages,
                                select: function(event, ui) {
                                    $("#village_tags_{{ $address->id }}").val(ui.item
                                        .label);
                                    $("#village_id_{{ $address->id }}").val(ui.item
                                        .value);

                                    return false;
                                }
                            });
                        }
                    });
                }
            @endforeach
        @endif
    });
</script>
@push('scripts')
    @if ($errors->any())
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                const event = new CustomEvent('open-modal', {
                    detail: 'add-address'
                });
                window.dispatchEvent(event);
            });
        </script>
    @endif
@endpush
