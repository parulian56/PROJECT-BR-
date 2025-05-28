@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <!-- Main card with subtle shadow -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <!-- Header with elegant border -->
        <div class="border-b border-gray-100 py-6 px-6 sm:px-8">
            <div class="text-center">
                <h2 class="text-2xl md:text-3xl font-semibold text-gray-800">
                    Daftar Kategori Produk
                </h2>
                <p class="mt-2 text-gray-500">Kelola kategori produk toko Anda</p>
            </div>
        </div>

        <!-- Categories grid -->
        <div class="p-6 sm:p-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Makanan -->
                <div class="group">
                    <a href="{{ url('admin/data/kategori/makanan') }}"
                       class="flex flex-col items-center justify-center h-36 rounded-lg bg-white border border-gray-200 hover:border-orange-300 shadow-xs hover:shadow-md transition-all duration-300 relative overflow-hidden">
                        <div class="w-14 h-14 rounded-full bg-orange-50 flex items-center justify-center mb-3 group-hover:bg-orange-100 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01M5 12h14a2 2 0 012 2v3a2 2 0 01-2 2H7a2 2 0 01-2-2v-3a2 2 0 012-2z M8 7V5c0-1.1.9-2 2-2h4a2 2 0 012 2v2M8 7h8" />
                            </svg>
                        </div>
                        <span class="text-lg font-medium text-gray-800">Makanan</span>
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-orange-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </a>
                </div>

                <!-- Minuman -->
                <div class="group">
                    <a href="{{ url('admin/data/kategori/minuman') }}"
                       class="flex flex-col items-center justify-center h-36 rounded-lg bg-white border border-gray-200 hover:border-orange-300 shadow-xs hover:shadow-md transition-all duration-300 relative overflow-hidden">
                        <div class="w-14 h-14 rounded-full bg-orange-50 flex items-center justify-center mb-3 group-hover:bg-orange-100 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 20h5.656M7 2h10l-2 6h-6L7 2zM5 8h14v1a5 5 0 01-5 5h-4a5 5 0 01-5-5V8z" />
                            </svg>
                        </div>
                        <span class="text-lg font-medium text-gray-800">Minuman</span>
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-orange-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </a>
                </div>

                <!-- Alat Tulis -->
                <div class="group">
                    <a href="{{ url('admin/data/kategori/alattulis') }}"
                       class="flex flex-col items-center justify-center h-36 rounded-lg bg-white border border-gray-200 hover:border-orange-300 shadow-xs hover:shadow-md transition-all duration-300 relative overflow-hidden">
                        <div class="w-14 h-14 rounded-full bg-orange-50 flex items-center justify-center mb-3 group-hover:bg-orange-100 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </div>
                        <span class="text-lg font-medium text-gray-800">Alat Tulis</span>
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-orange-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </a>
                </div>

                <!-- Seragam -->
                <div class="group">
                    <a href="{{ url('admin/data/kategori/seragam') }}"
                       class="flex flex-col items-center justify-center h-36 rounded-lg bg-white border border-gray-200 hover:border-orange-300 shadow-xs hover:shadow-md transition-all duration-300 relative overflow-hidden">
                        <div class="w-14 h-14 rounded-full bg-orange-50 flex items-center justify-center mb-3 group-hover:bg-orange-100 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 3h12l-2 5M16 8l-4 4-4-4M6 3l-2 5 2 12h12l2-12-2-5M12 16v5" />
                            </svg>
                        </div>
                        <span class="text-lg font-medium text-gray-800">Seragam</span>
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-orange-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </a>
                </div>

                <!-- Kesehatan & Kebersihan -->
                <div class="group">
                    <a href="{{ url('admin/data/kategori/kesehatandankebersihan') }}"
                       class="flex flex-col items-center justify-center h-36 rounded-lg bg-white border border-gray-200 hover:border-orange-300 shadow-xs hover:shadow-md transition-all duration-300 relative overflow-hidden">
                        <div class="w-14 h-14 rounded-full bg-orange-50 flex items-center justify-center mb-3 group-hover:bg-orange-100 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <span class="text-lg font-medium text-gray-800 text-center">Kesehatan & Kebersihan</span>
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-orange-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </a>
                </div>

                <!-- Lainnya -->
                <div class="group">
                    <a href="{{ url('admin/data/kategori/lainya') }}"
                       class="flex flex-col items-center justify-center h-36 rounded-lg bg-white border border-gray-200 hover:border-orange-300 shadow-xs hover:shadow-md transition-all duration-300 relative overflow-hidden">
                        <div class="w-14 h-14 rounded-full bg-orange-50 flex items-center justify-center mb-3 group-hover:bg-orange-100 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                        </div>
                        <span class="text-lg font-medium text-gray-800">Lainnya</span>
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-orange-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-gray-50 px-6 py-4 text-center border-t border-gray-100">
            <p class="text-gray-500 text-sm">Admin Panel • {{ now()->format('d M Y') }}</p>
        </div>
    </div>
</div>

<style>
    /* Smooth transitions */
    .group:hover .transform {
        transition-duration: 200ms;
    }

    /* Subtle shadow for cards */
    .shadow-xs {
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }

    /* Custom focus styles for accessibility */
    a:focus {
        outline: 2px solid rgba(249, 115, 22, 0.5);
        outline-offset: 2px;
    }

    /* Reduce motion for users who prefer it */
    @media (prefers-reduced-motion: reduce) {
        * {
            transition: none !important;
            animation: none !important;
        }
    }
</style>
@endsection