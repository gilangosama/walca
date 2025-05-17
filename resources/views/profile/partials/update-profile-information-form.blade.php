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
            <x-primary-button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'add-address')">{{ __('Tambah Alamat') }}</x-primary-button>
        </div>


        <div class="flex items-center justify-end gap-4 mt-6">
            <div class="flex-grow">
                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 bg-green-50 px-3 py-2 rounded-md border border-green-200 inline-flex items-center"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ __('Saved.') }}
                    </p>
                @endif
            </div>
            
            <!-- Tombol Chat Dengan Admin -->
            <button type="button" onclick="Tawk_API.toggle()" class="inline-flex items-center px-4 py-3 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                Chat Dengan Admin
            </button>
            
            <x-primary-button class="px-6 py-3 bg-black hover:bg-gray-800 transition-colors rounded shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                </svg>
                {{ __('Save') }}
            </x-primary-button>
<<<<<<< HEAD
=======

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
>>>>>>> cc2e049bd9b6944c8ee7b07135bee9b0e4c43749
        </div>
    </form>
    <x-modal name="add-address" focusable>
        <form action="{{ route('add-address') }}" method="post" >
            @csrf
            @method('post')
            <!-- Alamat Information -->
            <div
                class="p-6 bg-white rounded-lg shadow-sm border border-gray-100 transition-all duration-200 hover:shadow-md">
                <h3 class="text-md font-semibold text-gray-800 mb-4 flex items-center pb-2 border-b">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Alamat Pengiriman
                </h3>

                <!-- Nama dan No hp-->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="relative">
                        <x-input-label for="name" :value="__('Nama')" class="font-medium text-gray-700" />
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="">
                                <input id="name" type="text" name="name"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-black focus:border-black transition appearance-none bg-none" required
                                    placeholder="Masukan Nama">
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="relative">
                        <x-input-label for="no_telp" :value="__('No. HP/WhatsApp')" class="font-medium text-gray-700" />
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="">
                                <input id="no_telp" type="text"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="no_telp"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-black focus:border-black transition appearance-none bg-none"
                                    placeholder="Masukan No Telp" required>
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('no_telp')" />
                    </div>
                </div>

                <div class="mb-6">
                    <x-input-label :value="'Label'" class="font-medium text-gray-700 mb-2" />
                    <div class="flex gap-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="label" value="rumah" class="form-radio text-black" {{ old('label', $address->label ?? '') == 'rumah' ? 'checked' : '' }}>
                            <span class="ml-2">Rumah</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="label" value="kantor" class="form-radio text-black" {{ old('label', $address->label ?? '') == 'kantor' ? 'checked' : '' }}>
                            <span class="ml-2">Kantor</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="label" value="lainnya" class="form-radio text-black" {{ old('label', $address->label ?? '') == 'lainnya' ? 'checked' : '' }}>
                            <span class="ml-2">Lainnya</span>
                        </label>
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('label')" />
                </div>

                {{-- alammat lengkap --}}
                <div class="mb-6">
                    <x-input-label for="street" :value="__('Alamat Lengkap')" class="font-medium text-gray-700" />
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="absolute top-3 left-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <textarea id="street" name="street"
                            class="pl-10 block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-black focus:border-black transition" required
                            rows="3">{{ old('street', $address->street ?? '') }}</textarea>
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('street')" />
                </div>

                {{-- detail alamat --}}
                <div class="mb-6">
                    <x-input-label for="detail" :value="__('Keterangan')" class="font-medium text-gray-700" />
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="absolute top-3 left-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17V7a2 2 0 012-2h6a2 2 0 012 2v10a2 2 0 01-2 2H9a2 2 0 01-2-2z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17h6m-6 0v2a2 2 0 002 2h6a2 2 0 002-2v-2" />
                            </svg>
                        </div>
                        <input id="detail" name="detail"
                            class="pl-10 block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-black focus:border-black transition"
                            value="{{ old('detail', $address->detail ?? '') }}" rows="3" required>
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('detail')" />
                </div>

                <!-- Provinsi dan Kota -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="relative">
                        <x-input-label for="province" :value="__('Provinsi')" class="font-medium text-gray-700" />
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                            </div>
                            <div class="ui-widget">
                                <input id="province_tags"
                                    class="pl-10 block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-black focus:border-black transition appearance-none bg-none"
                                    placeholder="Ketik nama provinsi...">
                                <input type="hidden" name="province_id" id="province_id" required>
                            </div>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('province_id')" />
                    </div>

                    <div class="relative">
                        <x-input-label for="city" :value="__('Kota/Kabupaten')" class="font-medium text-gray-700" />
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div class="ui-widget">
                                <input id="regency_tags"
                                    class="pl-10 block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-black focus:border-black transition appearance-none bg-none"
                                    placeholder="Ketik nama provinsi...">
                                <input type="hidden" name="regency_id" id="regency_id" required>
                            </div>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('regency_id')" />
                    </div>
                </div>

                <!-- Kecamatan, Kelurahan, dan Kode Pos -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="relative">
                        <x-input-label for="district" :value="__('Kecamatan')" class="font-medium text-gray-700" />
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                            </div>
                            <div class="ui-widget">
                                <input id="district_tags"
                                    class="pl-10 block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-black focus:border-black transition appearance-none bg-none"
                                    placeholder="Ketik nama provinsi...">
                                <input type="hidden" name="district_id" id="district_id" required>
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('district_id')" />
                    </div>

                    <div class="relative">
                        <x-input-label for="village" :value="__('Kelurahan')" class="font-medium text-gray-700" />
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                            </div>
                            <div class="ui-widget">
                                <input id="village_tags"
                                    class="pl-10 block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-black focus:border-black transition appearance-none bg-none"
                                    placeholder="Ketik nama provinsi...">
                                <input type="hidden" name="village_id" id="village_id" required>
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('village')" />
                    </div>

                    <div class="relative">
                        <x-input-label for="postal_code" :value="__('Kode Pos')"
                            class="font-medium text-gray-700" />
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <x-text-input id="postal_code" name="postal_code" type="text"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" required
                                class="pl-10 block w-full no-spinner" :value="old('postal_code', $user->postal_code ?? '')" />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
                    </div>
                </div>
                <div class="flex items-center justify-end gap-4 mt-6">
                    <x-primary-button class="px-6 py-3 bg-black hover:bg-gray-800 transition-colors rounded shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </x-modal>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data provinsi dan kota
        const locationData = {
            'jawa-barat': [{
                    id: 'bandung',
                    name: 'Bandung'
                },
                {
                    id: 'bogor',
                    name: 'Bogor'
                },
                {
                    id: 'bekasi',
                    name: 'Bekasi'
                },
                {
                    id: 'cirebon',
                    name: 'Cirebon'
                },
                {
                    id: 'depok',
                    name: 'Depok'
                },
                {
                    id: 'tasikmalaya',
                    name: 'Tasikmalaya'
                }
            ],
            'jawa-tengah': [{
                    id: 'semarang',
                    name: 'Semarang'
                },
                {
                    id: 'solo',
                    name: 'Surakarta (Solo)'
                },
                {
                    id: 'magelang',
                    name: 'Magelang'
                },
                {
                    id: 'pekalongan',
                    name: 'Pekalongan'
                },
                {
                    id: 'salatiga',
                    name: 'Salatiga'
                }
            ],
            'jawa-timur': [{
                    id: 'surabaya',
                    name: 'Surabaya'
                },
                {
                    id: 'malang',
                    name: 'Malang'
                },
                {
                    id: 'kediri',
                    name: 'Kediri'
                },
                {
                    id: 'batu',
                    name: 'Batu'
                },
                {
                    id: 'madiun',
                    name: 'Madiun'
                },
                {
                    id: 'blitar',
                    name: 'Blitar'
                }
            ],
            'dki-jakarta': [{
                    id: 'jakarta-pusat',
                    name: 'Jakarta Pusat'
                },
                {
                    id: 'jakarta-utara',
                    name: 'Jakarta Utara'
                },
                {
                    id: 'jakarta-barat',
                    name: 'Jakarta Barat'
                },
                {
                    id: 'jakarta-selatan',
                    name: 'Jakarta Selatan'
                },
                {
                    id: 'jakarta-timur',
                    name: 'Jakarta Timur'
                },
                {
                    id: 'kepulauan-seribu',
                    name: 'Kepulauan Seribu'
                }
            ]
        };

        // Fungsi untuk mengupdate daftar kota berdasarkan provinsi
        function updateCities() {
            const provinceSelect = document.getElementById('province');
            const citySelect = document.getElementById('city');
            const selectedProvince = provinceSelect.value;

            // Hapus semua opsi kota
            citySelect.innerHTML = '<option value="">Pilih Kota</option>';

            // Jika provinsi dipilih, tambahkan kota-kotanya
            if (selectedProvince && locationData[selectedProvince]) {
                locationData[selectedProvince].forEach(city => {
                    const option = document.createElement('option');
                    option.value = city.id;
                    option.textContent = city.name;
                    // Set selected jika kota ini sebelumnya dipilih
                    option.selected = city.id === "{{ old('city', $user->city ?? '') }}";
                    citySelect.appendChild(option);
                });
            }

            updateAddressPreview();
        }

        // Function untuk update preview alamat
        function updateAddressPreview() {
            const address = document.getElementById('address').value;
            const province = document.getElementById('province');
            const provinceName = province.options[province.selectedIndex]?.text || '';

            const city = document.getElementById('city');
            const cityName = city.options[city.selectedIndex]?.text || '';

            const district = document.getElementById('district').value;
            const village = document.getElementById('village').value;
            const postalCode = document.getElementById('postal_code').value;

            const previewEl = document.getElementById('address-preview');

            if (address || provinceName !== 'Pilih Provinsi' || cityName !== 'Pilih Kota' || district ||
                village || postalCode) {
                const parts = [];

                if (address) parts.push(address);
                if (village) parts.push(`Kelurahan ${village}`);
                if (district) parts.push(`Kecamatan ${district}`);
                if (cityName && cityName !== 'Pilih Kota') parts.push(cityName);
                if (provinceName && provinceName !== 'Pilih Provinsi') parts.push(provinceName);
                if (postalCode) parts.push(postalCode);

                previewEl.innerHTML = parts.join(', ');
            } else {
                previewEl.innerHTML = 'Alamat lengkap Anda akan muncul di sini saat Anda mengisi form.';
            }
        }

        // Tambahkan event listener ke select provinsi
        const provinceSelect = document.getElementById('province');
        provinceSelect.addEventListener('change', updateCities);

        // Tambahkan event listener ke semua field alamat
        const addressFields = ['address', 'city', 'district', 'village', 'postal_code'];
        addressFields.forEach(field => {
            const el = document.getElementById(field);
            if (el) {
                el.addEventListener('input', updateAddressPreview);
            }
        });

        // Inisialisasi kota pada saat halaman dimuat
        updateCities();

        // Inisialisasi preview alamat
        updateAddressPreview();
    });
</script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
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
