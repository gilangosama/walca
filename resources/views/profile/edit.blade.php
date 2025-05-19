<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profil Saya') }}
            </h2>
            <span class="text-sm bg-black text-white px-3 py-1 rounded-full">Member Silver</span>
        </div>
    </x-slot>

    <!-- Hero Section with Profile Picture -->
    <div class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row items-center gap-6">
                <div class="relative">
                    <div class="h-28 w-28 rounded-full bg-white border-4 border-white shadow-md overflow-hidden">
                        <img src="{{ asset('img/avatar-placeholder.jpg') }}" alt="Profile" class="h-full w-full object-cover" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=000&color=fff'">
                    </div>
                    <button class="absolute bottom-1 right-1 bg-black text-white p-1.5 rounded-full shadow hover:bg-gray-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
                <div class="text-center md:text-left">
                    <h3 class="text-2xl font-bold">{{ auth()->user()->name }}</h3>
                    <p class="text-gray-600">{{ auth()->user()->email }}</p>
                    <p class="text-sm text-gray-500 mt-1">Bergabung sejak: {{ auth()->user()->created_at->format('d F Y') }}</p>
                </div>
                <div class="md:ml-auto grid grid-cols-2 gap-6 text-center bg-white rounded-lg shadow-sm p-4">
                    <div>
                        <p class="text-3xl font-bold">{{ $user->orders->count() }}</p>
                        <p class="text-gray-500">Pesanan</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">0</p>
                        <p class="text-gray-500">Ulasan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tab Navigation -->
            <div class="mb-8 border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="profileTabs" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg text-white hover:border-gray-300 hover:text-gray-600 hover:bg-gray-50 transition-colors" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Profil
                        </button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg text-white hover:border-gray-300 hover:text-gray-600 hover:bg-gray-50 transition-colors" id="orders-tab" data-tabs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Order Saya
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Tab Content -->
            <div id="tabContent">
                <!-- Profile Tab Panel -->
                <div class="block space-y-6" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg transition-all duration-300 hover:shadow-md">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg transition-all duration-300 hover:shadow-md">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg transition-all duration-300 hover:shadow-md">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>

                <!-- Orders Tab Panel -->
                <div class="hidden" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg transition-all duration-300 hover:shadow-md">
                        <div>
                            <h2 class="text-lg font-medium text-gray-900 mb-6 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                Order Saya
                            </h2>
                            
                            <div class="space-y-6">
                                @forelse ($user->orders as $order)
                                <!-- Order Item -->
                                <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                                    <div class="bg-gray-50 px-4 py-3 border-b border-gray-200 flex justify-between items-center">
                                        <div>
                                            <span class="text-xs text-gray-500">Order ID: #{{ $order->invoice }}</span>
                                            <p class="text-sm font-medium">{{ $order->created_at->format('d F Y') }}</p>
                                        </div>
                                        <div class="bg-{{ $order->status === 'pending' ? 'yellow' : ($order->status === 'processing' ? 'blue' : ($order->status === 'completed' ? 'green' : 'gray')) }}-100 
                                                    text-{{ $order->status === 'pending' ? 'yellow' : ($order->status === 'processing' ? 'blue' : ($order->status === 'completed' ? 'green' : 'gray')) }}-800 
                                                    text-xs font-medium px-2.5 py-0.5 rounded-full shadow-sm 
                                                    border border-{{ $order->status === 'pending' ? 'yellow' : ($order->status === 'processing' ? 'blue' : ($order->status === 'completed' ? 'green' : 'gray')) }}-200">
                                            {{ ucfirst($order->status) }}
                                        </div>
                                    </div>
                                    
                                    @foreach ($order->orderItems as $item)
                                    <div class="p-4 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                        <div class="flex items-start space-x-4">
                                            @if(isset($item->product->image) && is_array($item->product->image) && count($item->product->image) > 0)
                                                <img src="{{ asset('img/' . $item->product->image[0]) }}" alt="{{ $item->product->name }}" class="h-20 w-20 object-cover rounded-md shadow-sm">
                                            @else
                                                <div class="h-20 w-20 bg-gray-200 flex items-center justify-center rounded-md">
                                                    <span class="text-gray-500">No Image</span>
                                                </div>
                                            @endif
                                            <div class="flex-1">
                                                <h3 class="text-sm font-bold">{{ $item->product->name }}</h3>
                                                <div class="flex flex-wrap gap-2 mt-1">
                                                    @if(isset($item->product->size) && is_array($item->product->size))
                                                        <span class="px-2 py-0.5 bg-gray-100 text-gray-800 rounded text-xs">Size: {{ $item->product->size[0] ?? 'N/A' }}</span>
                                                    @endif
                                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-800 rounded text-xs">Qty: {{ $item->quantity }}</span>
                                                </div>
                                                <p class="text-sm font-semibold mt-2">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    <div class="mt-4 p-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                                        <div>
                                            <p class="text-sm text-gray-500">Total Pembayaran</p>
                                            <p class="text-base font-semibold">Rp {{ number_format($order->grand_total, 0, ',', '.') }}</p>
                                        </div>
                                        <div class="space-x-2">
                                            <button class="px-3 py-1.5 text-xs border border-black text-black rounded hover:bg-black hover:text-white transition-colors">Detail</button>
                                            @if($order->status === 'processing' || $order->status === 'shipping')
                                                <button class="px-3 py-1.5 text-xs bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors">Lacak</button>
                                            @else
                                                <button class="px-3 py-1.5 text-xs bg-black text-white rounded hover:bg-gray-800 transition-colors">Beli Lagi</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="text-center py-8">
                                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 text-blue-500 mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 mb-1">Belum ada Pesanan</h3>
                                    <p class="text-gray-500 mb-4">Sepertinya Anda belum membuat pesanan apapun</p>
                                    <a href="{{ route('shops') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-black text-white rounded-md hover:bg-gray-800 transition-colors">
                                        Mulai Belanja
                                    </a>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabElements = [
                {
                    id: 'profile-tab',
                    triggerEl: document.querySelector('#profile-tab'),
                    targetEl: document.querySelector('#profile')
                },
                {
                    id: 'orders-tab',
                    triggerEl: document.querySelector('#orders-tab'),
                    targetEl: document.querySelector('#orders')
                }
            ];
            
            // Show the first tab by default
            document.querySelector('#profile').classList.add('block');
            document.querySelector('#profile').classList.remove('hidden');
            document.querySelector('#profile-tab').classList.add('border-b-2', 'border-black', 'text-black');
            
            tabElements.forEach(tab => {
                tab.triggerEl.addEventListener('click', () => {
                    // Hide all tabs
                    tabElements.forEach(otherTab => {
                        otherTab.targetEl.classList.add('hidden');
                        otherTab.targetEl.classList.remove('block');
                        otherTab.triggerEl.classList.remove('border-b-2', 'border-black', 'text-black');
                    });
                    
                    // Show the selected tab
                    tab.targetEl.classList.remove('hidden');
                    tab.targetEl.classList.add('block');
                    tab.triggerEl.classList.add('border-b-2', 'border-black', 'text-black');
                });
            });
        });
    </script>
</x-app-layout>
