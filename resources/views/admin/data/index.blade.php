@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center border-b-2 pb-2 border-orange-200">Daftar Kategori Produk</h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
        <!-- Makanan -->
        <div class="relative overflow-hidden">
            <a href="{{ url('admin/data/kategori/makanan/index') }}"
                class="ripple-button flex items-center justify-center h-24 bg-orange-500 hover:bg-orange-600 text-white text-lg font-semibold rounded-none shadow hover:shadow-lg transition duration-300 active:bg-orange-700 relative overflow-hidden">
                <span class="text-center relative z-10">Makanan</span>
            </a>
        </div>

        <!-- Minuman -->
        <div class="relative overflow-hidden">
            <a href="{{ url('admin/data/kategori/minuman/index') }}"
                class="ripple-button flex items-center justify-center h-24 bg-orange-500 hover:bg-orange-600 text-white text-lg font-semibold rounded-none shadow hover:shadow-lg transition duration-300 active:bg-orange-700 relative overflow-hidden">
                <span class="text-center relative z-10">Minuman</span>
            </a>
        </div>

        <!-- Alat Tulis -->
        <div class="relative overflow-hidden">
            <a href="{{ url('admin/data/kategori/alat_tulis/index') }}"
                class="ripple-button flex items-center justify-center h-24 bg-orange-500 hover:bg-orange-600 text-white text-lg font-semibold rounded-none shadow hover:shadow-lg transition duration-300 active:bg-orange-700 relative overflow-hidden">
                <span class="text-center relative z-10">Alat Tulis</span>
            </a>
        </div>

        <!-- Seragam -->
        <div class="relative overflow-hidden">
            <a href="{{ url('admin/data/kategori/seragam/index') }}"
                class="ripple-button flex items-center justify-center h-24 bg-orange-500 hover:bg-orange-600 text-white text-lg font-semibold rounded-none shadow hover:shadow-lg transition duration-300 active:bg-orange-700 relative overflow-hidden">
                <span class="text-center relative z-10">Seragam</span>
            </a>
        </div>

        <!-- Kesehatan & Kebersihan -->
        <div class="relative overflow-hidden">
            <a href="{{ url('admin/data/kategori/kesehatandankebersihan/index') }}"
                class="ripple-button flex items-center justify-center h-24 bg-orange-500 hover:bg-orange-600 text-white text-lg font-semibold rounded-none shadow hover:shadow-lg transition duration-300 active:bg-orange-700 relative overflow-hidden px-4">
                <span class="text-center relative z-10">Kesehatan & Kebersihan</span>
            </a>
        </div>

        <!-- Lainnya -->
        <div class="relative overflow-hidden">
            <a href="{{ url('admin/data/kategori/lainya/index') }}"
                class="ripple-button flex items-center justify-center h-24 bg-orange-500 hover:bg-orange-600 text-white text-lg font-semibold rounded-none shadow hover:shadow-lg transition duration-300 active:bg-orange-700 relative overflow-hidden">
                <span class="text-center relative z-10">Lainya</span>
            </a>
        </div>
    </div>
</div>

<style>
    .ripple-button {
        position: relative;
        overflow: hidden;
    }

    .ripple-button:after {
        content: "";
        display: block;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        pointer-events: none;
        background-image: radial-gradient(circle, #fff 10%, transparent 10.01%);
        background-repeat: no-repeat;
        background-position: 50%;
        transform: scale(10, 10);
        opacity: 0;
        transition: transform .5s, opacity 1s;
    }

    .ripple-button:active:after {
        transform: scale(0, 0);
        opacity: 0.3;
        transition: 0s;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.ripple-button');

        buttons.forEach(button => {
            button.addEventListener('mousedown', function(e) {
                // Remove any existing ripples
                const existingRipples = this.querySelectorAll('.ripple');
                existingRipples.forEach(ripple => ripple.remove());

                // Create new ripple
                const ripple = document.createElement('span');
                ripple.classList.add('ripple');

                // Position the ripple
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size/2;
                const y = e.clientY - rect.top - size/2;

                ripple.style.width = ripple.style.height = `${size}px`;
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;

                this.appendChild(ripple);

                // Remove ripple after animation completes
                setTimeout(() => {
                    ripple.remove();
                }, 1000);
            });
        });
    });
</script>
</div>
@endsection
