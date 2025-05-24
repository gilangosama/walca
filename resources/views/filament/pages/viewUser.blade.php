<x-filament::page>
    {{-- Detail user --}}
    <x-filament::section label="Detail User">
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
            <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex flex-col md:flex-row items-center gap-6 w-full">
                    <div class="relative flex-shrink-0">
                        <div class="h-28 w-28 rounded-full bg-white border-4 border-white shadow-md overflow-hidden">
                            <img src="{{ asset('img/avatar-placeholder.jpg') }}" alt="Profile"
                                class="h-full w-full object-cover"
                                onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($record->name) }}&background=000&color=fff'">
                        </div>
                    </div>
                    <div class="flex-1 w-full">
                        <h3 class="text-2xl font-bold break-words">{{ $record->name }}</h3>
                        <p class="text-gray-600 break-all">{{ $record->email }}</p>
                        <p class="text-sm text-gray-500 mt-1">Bergabung sejak:
                            {{ $record->created_at->format('d F Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

    {{-- Tabel Address --}}
        <x-slot name="heading">Alamat User</x-slot>
        <x-slot name="description">Daftar alamat lengkap user ini</x-slot>

        @forelse($record->address as $address)
            <x-filament::card class="mb-4">
                <div class="font-semibold text-gray-800">
                    {{ $address->name }}
                    <span class="text-xs text-gray-500">({{ ucfirst($address->label) }})</span>
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
            </x-filament::card>
        @empty
            <div class="text-center text-sm text-gray-500">
                Belum ada alamat.
            </div>
        @endforelse
    </x-filament::section>
</x-filament::page>
