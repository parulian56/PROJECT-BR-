@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="bg-gradient-to-r from-orange-50 to-white rounded-xl shadow-xl overflow-hidden">
        <!-- Header with animated underline -->
        <div class="relative py-8 px-6 bg-white bg-opacity-90">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 text-center">
                <span class="relative inline-block">
                    Daftar Kategori Produk
                    <span class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-orange-300 to-orange-500 transform scale-x-0 transition-transform duration-500 ease-out group-hover:scale-x-100 animate-pulse-slow"></span>
                </span>
            </h2>
            <div class="absolute bottom-0 left-1/4 right-1/4 h-0.5 bg-gradient-to-r from-transparent via-orange-400 to-transparent"></div>
        </div>

        <!-- Categories grid with improved layout -->
        <div class="p-6 md:p-8 bg-orange-50 bg-opacity-50">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6">
                <!-- Makanan -->
                <div class="category-card group transform transition-all duration-300 hover:scale-[1.02]">
                    <a href="{{ url('admin/data/kategori/makanan') }}"
                       class="category-button flex flex-col items-center justify-center h-36 rounded-lg bg-gradient-to-br from-orange-400 to-orange-500 text-white overflow-hidden relative">
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-2 transform group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01M5 12h14a2 2 0 012 2v3a2 2 0 01-2 2H7a2 2 0 01-2-2v-3a2 2 0 012-2z M8 7V5c0-1.1.9-2 2-2h4a2 2 0 012 2v2M8 7h8" />
                        </svg>
                        <span class="text-xl font-bold tracking-wide relative z-10">Makanan</span>
                        <div class="corner-accent"></div>
                    </a>
                </div>

                <!-- Minuman -->
                <div class="category-card group transform transition-all duration-300 hover:scale-[1.02]">
                    <a href="{{ url('admin/data/kategori/minuman') }}"
                       class="category-button flex flex-col items-center justify-center h-36 rounded-lg bg-gradient-to-br from-orange-400 to-orange-500 text-white overflow-hidden relative">
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-2 transform group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 20h5.656M7 2h10l-2 6h-6L7 2zM5 8h14v1a5 5 0 01-5 5h-4a5 5 0 01-5-5V8z" />
                        </svg>
                        <span class="text-xl font-bold tracking-wide relative z-10">Minuman</span>
                        <div class="corner-accent"></div>
                    </a>
                </div>

                <!-- Alat Tulis -->
                <div class="category-card group transform transition-all duration-300 hover:scale-[1.02]">
                    <a href="{{ url('admin/data/kategori/alattulis') }}"
                       class="category-button flex flex-col items-center justify-center h-36 rounded-lg bg-gradient-to-br from-orange-400 to-orange-500 text-white overflow-hidden relative">
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2 transform group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        <span class="text-xl font-bold tracking-wide relative z-10">Alat Tulis</span>
                        <div class="corner-accent"></div>
                    </a>
                </div>

                <!-- Seragam -->
                <div class="category-card group transform transition-all duration-300 hover:scale-[1.02]">
                    <a href="{{ url('admin/data/kategori/seragam') }}"
                       class="category-button flex flex-col items-center justify-center h-36 rounded-lg bg-gradient-to-br from-orange-400 to-orange-500 text-white overflow-hidden relative">
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-2 transform group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 3h12l-2 5M16 8l-4 4-4-4M6 3l-2 5 2 12h12l2-12-2-5M12 16v5" />
                        </svg>
                        <span class="text-xl font-bold tracking-wide relative z-10">Seragam</span>
                        <div class="corner-accent"></div>
                    </a>
                </div>

                <!-- Kesehatan & Kebersihan -->
                <div class="category-card group transform transition-all duration-300 hover:scale-[1.02]">
                    <a href="{{ url('admin/data/kategori/kesehatandankebersihan') }}"
                       class="category-button flex flex-col items-center justify-center h-36 rounded-lg bg-gradient-to-br from-orange-400 to-orange-500 text-white overflow-hidden relative">
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2 transform group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="text-xl font-bold tracking-wide relative z-10 text-center">Kesehatan & Kebersihan</span>
                        <div class="corner-accent"></div>
                    </a>
                </div>

                <!-- Lainnya -->
                <div class="category-card group transform transition-all duration-300 hover:scale-[1.02]">
                    <a href="{{ url('admin/data/kategori/lainya') }}"
                       class="category-button flex flex-col items-center justify-center h-36 rounded-lg bg-gradient-to-br from-orange-400 to-orange-500 text-white overflow-hidden relative">
                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2 transform group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                        </svg>
                        <span class="text-xl font-bold tracking-wide relative z-10">Lainnya</span>
                        <div class="corner-accent"></div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer with subtle branding -->
        <div class="bg-white bg-opacity-80 px-6 py-4 text-center">
            <p class="text-orange-500 font-medium text-sm tracking-wider">ADMINISTRATOR PANEL</p>
        </div>
    </div>
</div>

<style>
    /* Advanced ripple effect */
    .category-button {
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(249, 115, 22, 0.1), 0 2px 4px -1px rgba(249, 115, 22, 0.06);
        transition: all 0.3s ease;
    }

    .category-button:hover {
        box-shadow: 0 10px 15px -3px rgba(249, 115, 22, 0.2), 0 4px 6px -2px rgba(249, 115, 22, 0.1);
    }

    /* Enhanced ripple effect */
    .category-button:after {
        content: "";
        display: block;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        pointer-events: none;
        background-image: radial-gradient(circle, rgba(255, 255, 255, 0.8) 10%, transparent 10.01%);
        background-repeat: no-repeat;
        background-position: 50%;
        transform: scale(10, 10);
        opacity: 0;
        transition: transform 0.5s, opacity 1s;
    }

    .category-button:active:after {
        transform: scale(0, 0);
        opacity: 0.3;
        transition: 0s;
    }

    /* Decorative corner accent */
    .corner-accent {
        position: absolute;
        top: 0;
        right: 0;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 20px 20px 0;
        border-color: transparent rgba(255, 255, 255, 0.2) transparent transparent;
    }

    /* Subtle animation for cards */
    @keyframes pulse-slow {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.8;
        }
    }

    .animate-pulse-slow {
        animation: pulse-slow 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.category-button');

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
                const size = Math.max(rect.width, rect.height) * 2;
                const x = e.clientX - rect.left - size/2;
                const y = e.clientY - rect.top - size/2;

                // Apply styles to the ripple
                ripple.style.width = ripple.style.height = `${size}px`;
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;
                ripple.style.position = 'absolute';
                ripple.style.borderRadius = '50%';
                ripple.style.backgroundColor = 'rgba(255, 255, 255, 0.7)';
                ripple.style.transform = 'scale(0)';
                ripple.style.animation = 'ripple 0.6s linear';

                this.appendChild(ripple);

                // Remove ripple after animation completes
                setTimeout(() => {
                    ripple.remove();
                }, 700);
            });
        });

        // Add keyframe animation for ripple effect
        const style = document.createElement('style');
        style.type = 'text/css';
        style.innerHTML = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    });
</script>
@endsection
