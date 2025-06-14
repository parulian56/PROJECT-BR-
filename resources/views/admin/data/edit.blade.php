@extends('layouts.admin')

@section('content')
<style>
    /* Enhanced Amber Gradient Background */
    .amber-cosmic-bg {
        background:
            radial-gradient(ellipse at top left, rgba(251, 191, 36, 0.08) 0%, transparent 50%),
            radial-gradient(ellipse at bottom right, rgba(217, 119, 6, 0.06) 0%, transparent 50%),
            radial-gradient(ellipse at center, rgba(245, 158, 11, 0.04) 0%, transparent 70%),
            linear-gradient(135deg, #fffbeb 0%, #fef3c7 25%, #fde68a 75%, #fcd34d 100%);
        min-height: 100vh;
        position: relative;
        animation: backgroundFlow 20s ease-in-out infinite;
    }

    @keyframes backgroundFlow {
        0%, 100% { background-position: 0% 50%, 100% 50%, 50% 0%; }
        50% { background-position: 100% 50%, 0% 50%, 50% 100%; }
    }

    /* Floating Amber Particles */
    .amber-particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
        z-index: 1;
    }

    .particle {
        position: absolute;
        opacity: 0.1;
        animation: floatParticle 15s linear infinite;
        font-size: 1.5rem;
    }

    .particle:nth-child(1) {
        top: 10%;
        left: 15%;
        animation-delay: 0s;
        animation-duration: 12s;
    }

    .particle:nth-child(2) {
        top: 25%;
        right: 20%;
        animation-delay: 3s;
        animation-duration: 18s;
    }

    .particle:nth-child(3) {
        bottom: 30%;
        left: 10%;
        animation-delay: 6s;
        animation-duration: 14s;
    }

    .particle:nth-child(4) {
        bottom: 15%;
        right: 15%;
        animation-delay: 9s;
        animation-duration: 16s;
    }

    .particle:nth-child(5) {
        top: 50%;
        left: 5%;
        animation-delay: 12s;
        animation-duration: 20s;
    }

    .particle:nth-child(6) {
        top: 60%;
        right: 8%;
        animation-delay: 15s;
        animation-duration: 13s;
    }

    @keyframes floatParticle {
        0%, 100% {
            transform: translateY(0px) translateX(0px) rotate(0deg) scale(1);
            opacity: 0.1;
        }
        25% {
            transform: translateY(-30px) translateX(20px) rotate(90deg) scale(1.1);
            opacity: 0.2;
        }
        50% {
            transform: translateY(-20px) translateX(-15px) rotate(180deg) scale(0.9);
            opacity: 0.15;
        }
        75% {
            transform: translateY(-40px) translateX(10px) rotate(270deg) scale(1.05);
            opacity: 0.12;
        }
    }

    /* Ultra Premium Card */
    .ultra-premium-card {
        background:
            linear-gradient(145deg, rgba(255, 255, 255, 0.95), rgba(255, 251, 235, 0.9)),
            linear-gradient(45deg, rgba(251, 191, 36, 0.03), rgba(217, 119, 6, 0.02));
        backdrop-filter: blur(20px);
        border: 3px solid transparent;
        background-clip: padding-box;
        border-radius: 2rem;
        box-shadow:
            0 25px 50px rgba(245, 158, 11, 0.15),
            0 15px 30px rgba(217, 119, 6, 0.1),
            0 5px 15px rgba(180, 83, 9, 0.05),
            inset 0 1px 0 rgba(255, 255, 255, 0.3),
            inset 0 -1px 0 rgba(0, 0, 0, 0.05);
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        z-index: 10;
    }

    .ultra-premium-card::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg, #fbbf24, #f59e0b, #d97706, #b45309, #fbbf24);
        background-size: 400% 400%;
        border-radius: 2.2rem;
        z-index: -1;
        animation: borderGlow 4s ease-in-out infinite;
    }

    .ultra-premium-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 215, 0, 0.1), transparent);
        animation: luxuryShimmer 5s infinite;
        z-index: 1;
    }

    @keyframes borderGlow {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    @keyframes luxuryShimmer {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    .ultra-premium-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow:
            0 35px 70px rgba(245, 158, 11, 0.25),
            0 20px 40px rgba(217, 119, 6, 0.15),
            0 10px 20px rgba(180, 83, 9, 0.1);
    }

    /* Magnificent Title */
    .magnificent-title {
        background: linear-gradient(135deg, #b45309 0%, #d97706 25%, #f59e0b 50%, #fbbf24 75%, #fcd34d 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 3rem;
        font-weight: 900;
        text-align: center;
        margin-bottom: 2rem;
        position: relative;
        z-index: 2;
        text-shadow: 0 4px 8px rgba(180, 83, 9, 0.2);
        letter-spacing: -0.02em;
        animation: titleGlow 3s ease-in-out infinite;
    }

    @keyframes titleGlow {
        0%, 100% { filter: brightness(1) saturate(1); }
        50% { filter: brightness(1.1) saturate(1.2); }
    }

    .magnificent-title::before {
        content: '💎';
        position: absolute;
        left: -50px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 2rem;
        animation: gemFloat 4s ease-in-out infinite;
    }

    .magnificent-title::after {
        content: '✨';
        position: absolute;
        right: -50px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 2rem;
        animation: gemFloat 4s ease-in-out infinite reverse;
    }

    @keyframes gemFloat {
        0%, 100% {
            transform: translateY(-50%) scale(1) rotate(0deg);
            opacity: 0.8;
        }
        25% {
            transform: translateY(-60%) scale(1.1) rotate(90deg);
            opacity: 1;
        }
        50% {
            transform: translateY(-40%) scale(0.9) rotate(180deg);
            opacity: 0.9;
        }
        75% {
            transform: translateY(-55%) scale(1.05) rotate(270deg);
            opacity: 0.85;
        }
    }

    /* Premium Error Alert */
    .premium-error-alert {
        background:
            linear-gradient(145deg, rgba(254, 242, 242, 0.95), rgba(254, 226, 226, 0.9)),
            linear-gradient(45deg, rgba(239, 68, 68, 0.05), rgba(220, 38, 38, 0.03));
        backdrop-filter: blur(10px);
        border: 2px solid #ef4444;
        border-radius: 1rem;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow:
            0 10px 25px rgba(239, 68, 68, 0.15),
            0 4px 10px rgba(220, 38, 38, 0.1);
        position: relative;
        overflow: hidden;
        animation: alertPulse 2s ease-in-out infinite;
    }

    @keyframes alertPulse {
        0%, 100% { box-shadow: 0 10px 25px rgba(239, 68, 68, 0.15); }
        50% { box-shadow: 0 15px 35px rgba(239, 68, 68, 0.25); }
    }

    .premium-error-alert::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(239, 68, 68, 0.1), transparent);
        animation: errorShimmer 3s infinite;
    }

    @keyframes errorShimmer {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    /* Enhanced Form Elements */
    .premium-label {
        color: #92400e;
        font-weight: 800;
        font-size: 1.25rem;
        margin-bottom: 0.75rem;
        display: block;
        text-shadow: 0 1px 2px rgba(146, 64, 14, 0.1);
        position: relative;
        z-index: 2;
    }

    .premium-input {
        width: 100%;
        border: 3px solid #fbbf24;
        border-radius: 1rem;
        padding: 1rem 1.25rem;
        font-size: 1.1rem;
        font-weight: 600;
        color: #78350f;
        background:
            linear-gradient(145deg, rgba(255, 255, 255, 0.9), rgba(255, 251, 235, 0.8)),
            linear-gradient(45deg, rgba(251, 191, 36, 0.05), rgba(217, 119, 6, 0.03));
        backdrop-filter: blur(10px);
        box-shadow:
            0 4px 8px rgba(251, 191, 36, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.2),
            inset 0 -1px 0 rgba(0, 0, 0, 0.05);
        transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
        position: relative;
    }

    .premium-input:focus {
        outline: none;
        border-color: #f59e0b;
        box-shadow:
            0 0 0 4px rgba(245, 158, 11, 0.2),
            0 8px 16px rgba(251, 191, 36, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        transform: translateY(-2px) scale(1.02);
        background:
            linear-gradient(145deg, rgba(255, 255, 255, 0.95), rgba(255, 251, 235, 0.9)),
            linear-gradient(45deg, rgba(251, 191, 36, 0.08), rgba(217, 119, 6, 0.05));
    }

    /* Spectacular Buttons */
    .spectacular-btn-primary {
        background: linear-gradient(145deg, #f59e0b 0%, #d97706 50%, #b45309 100%);
        border: none;
        border-radius: 9999px;
        padding: 1rem 2rem;
        font-weight: 800;
        font-size: 1.1rem;
        color: white;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        box-shadow:
            0 10px 20px rgba(245, 158, 11, 0.3),
            0 6px 12px rgba(217, 119, 6, 0.2),
            0 2px 4px rgba(180, 83, 9, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.2),
            inset 0 -1px 0 rgba(0, 0, 0, 0.1);
        transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .spectacular-btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .spectacular-btn-primary:hover::before {
        left: 100%;
    }

    .spectacular-btn-primary:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow:
            0 15px 30px rgba(245, 158, 11, 0.4),
            0 8px 16px rgba(217, 119, 6, 0.3),
            0 4px 8px rgba(180, 83, 9, 0.2);
    }

    .spectacular-btn-primary:active {
        transform: translateY(-1px) scale(1.02);
    }

    .spectacular-btn-secondary {
        background:
            linear-gradient(145deg, rgba(245, 245, 244, 0.9), rgba(231, 229, 228, 0.8)),
            linear-gradient(45deg, rgba(251, 191, 36, 0.05), rgba(217, 119, 6, 0.03));
        backdrop-filter: blur(10px);
        border: 2px solid #fbbf24;
        color: #92400e;
        border-radius: 9999px;
        padding: 1rem 2rem;
        font-weight: 700;
        font-size: 1.1rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
        box-shadow:
            0 4px 8px rgba(251, 191, 36, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
    }

    .spectacular-btn-secondary::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, rgba(245, 158, 11, 0.1), rgba(217, 119, 6, 0.05));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .spectacular-btn-secondary:hover::before {
        opacity: 1;
    }

    .spectacular-btn-secondary:hover {
        transform: translateY(-2px) scale(1.03);
        box-shadow:
            0 8px 16px rgba(251, 191, 36, 0.25),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        color: #78350f;
        border-color: #f59e0b;
        text-decoration: none;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .magnificent-title {
            font-size: 2.25rem;
        }

        .magnificent-title::before,
        .magnificent-title::after {
            font-size: 1.5rem;
            left: -35px;
            right: -35px;
        }

        .ultra-premium-card {
            margin: 1rem;
            padding: 1.5rem;
        }

        .particle {
            font-size: 1rem;
        }
    }
</style>

<div class="amber-cosmic-bg px-4 pt-6 flex justify-center items-start">
    <!-- Floating Amber Particles -->
    <div class="amber-particles">
        <div class="particle">💎</div>
        <div class="particle">✨</div>
        <div class="particle">🌟</div>
        <div class="particle">💫</div>
        <div class="particle">⭐</div>
        <div class="particle">🏆</div>
    </div>

    <div class="w-full max-w-xl ultra-premium-card p-8">
        <h2 class="magnificent-title">Update Stok Barang</h2>

        @if ($errors->any())
            <div class="premium-error-alert">
                <strong class="text-red-600 text-lg font-bold">🚨 Ups! Ada kesalahan:</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm text-red-700 font-medium">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.data.update', $data->id) }}" method="POST" id="updateForm">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="stok" class="premium-label">📦 Jumlah Stok</label>
                <input
                    type="number"
                    name="stok"
                    id="stok"
                    min="1"
                    max="9999"
                    required
                    class="premium-input"
                    placeholder="Masukkan jumlah stok..."
                    value="{{ old('stok', $data->stok) }}"
                >
            </div>

            <div class="mt-6 flex flex-wrap justify-center gap-4">
                <button type="submit" class="spectacular-btn-primary">
                    🚀 Update Stok
                </button>

                <a href="{{ route('admin.data.index') }}" class="spectacular-btn-secondary">
                    🔙 Kembali
                </a>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('stok');
    const card = document.querySelector('.ultra-premium-card');
    const form = document.getElementById('updateForm');

    // Enhanced input interactions
    input.addEventListener('focus', function() {
        card.style.transform = 'translateY(-8px) scale(1.02)';
        createInputParticles();
    });

    input.addEventListener('blur', function() {
        card.style.transform = 'translateY(0px) scale(1)';
    });

    // Form submission with particle effects
    form.addEventListener('submit', function(e) {
        createSubmitParticles();
    });

    // Real-time input validation feedback
    input.addEventListener('input', function() {
        const value = parseInt(this.value);

        if (value < 1 || value > 9999 || isNaN(value)) {
            this.style.borderColor = '#ef4444';
            this.style.boxShadow = '0 0 0 4px rgba(239, 68, 68, 0.2)';
        } else {
            this.style.borderColor = '#fbbf24';
            this.style.boxShadow = '';
        }
    });

    function createInputParticles() {
        for (let i = 0; i < 5; i++) {
            setTimeout(() => {
                const particle = document.createElement('div');
                const emojis = ['✨', '💎', '🌟'];
                particle.innerHTML = emojis[Math.floor(Math.random() * emojis.length)];
                particle.style.position = 'fixed';
                particle.style.left = (input.getBoundingClientRect().left + Math.random() * input.offsetWidth) + 'px';
                particle.style.top = (input.getBoundingClientRect().top - 20) + 'px';
                particle.style.fontSize = '1rem';
                particle.style.color = '#fbbf24';
                particle.style.pointerEvents = 'none';
                particle.style.zIndex = '9999';
                particle.style.animation = 'particleRise 2s ease-out forwards';
                document.body.appendChild(particle);

                setTimeout(() => particle.remove(), 2000);
            }, i * 100);
        }
    }

    function createSubmitParticles() {
        const rect = form.getBoundingClientRect();
        const centerX = rect.left + rect.width / 2;
        const centerY = rect.top + rect.height / 2;

        for (let i = 0; i < 12; i++) {
            setTimeout(() => {
                const particle = document.createElement('div');
                const emojis = ['🎉', '✨', '💎', '🏆', '🌟'];
                particle.innerHTML = emojis[Math.floor(Math.random() * emojis.length)];
                particle.style.position = 'fixed';
                particle.style.left = (centerX + (Math.random() - 0.5) * 200) + 'px';
                particle.style.top = (centerY + (Math.random() - 0.5) * 100) + 'px';
                particle.style.fontSize = (Math.random() * 0.5 + 1) + 'rem';
                particle.style.color = '#f59e0b';
                particle.style.pointerEvents = 'none';
                particle.style.zIndex = '9999';
                particle.style.animation = 'celebrationBurst 3s ease-out forwards';
                document.body.appendChild(particle);

                setTimeout(() => particle.remove(), 3000);
            }, i * 50);
        }
    }

    // Add custom animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes particleRise {
            0% {
                transform: translateY(0px) scale(0);
                opacity: 1;
            }
            100% {
                transform: translateY(-50px) scale(1);
                opacity: 0;
            }
        }

        @keyframes celebrationBurst {
            0% {
                transform: scale(0) rotate(0deg);
                opacity: 1;
            }
            50% {
                transform: scale(1.2) rotate(180deg);
                opacity: 0.8;
            }
            100% {
                transform: scale(0) rotate(360deg);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
});
</script>

@endsection
