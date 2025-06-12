@extends('layouts.admin')

@section('content')
<style>
    .amber-gradient {
        background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 25%, #d97706 50%, #b45309 75%, #92400e 100%);
    }

    .gold-shimmer {
        background: linear-gradient(45deg, #ffd700, #ffed4e, #fbbf24, #f59e0b);
        background-size: 400% 400%;
        animation: shimmer 3s ease-in-out infinite;
    }

    @keyframes shimmer {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .luxury-card {
        background: linear-gradient(145deg, #fffbeb, #fef3c7);
        border: 2px solid #f59e0b;
        box-shadow:
            0 20px 40px rgba(245, 158, 11, 0.15),
            0 10px 20px rgba(217, 119, 6, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        position: relative;
        overflow: hidden;
    }

    .luxury-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 215, 0, 0.2), transparent);
        animation: sweep 3s infinite;
    }

    @keyframes sweep {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    .golden-title {
        background: linear-gradient(45deg, #b45309, #d97706, #f59e0b, #fbbf24);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 0 2px 4px rgba(180, 83, 9, 0.3);
        font-weight: 700;
        font-size: 2.5rem;
        position: relative;
    }

    .golden-title::after {
        content: '✨';
        position: absolute;
        right: -40px;
        top: -10px;
        animation: sparkle 2s ease-in-out infinite;
    }

    @keyframes sparkle {
        0%, 100% { transform: scale(1) rotate(0deg); opacity: 1; }
        50% { transform: scale(1.2) rotate(180deg); opacity: 0.8; }
    }

    .amber-input {
        background: linear-gradient(145deg, #fffbeb, #fef3c7);
        border: 2px solid #f59e0b;
        border-radius: 15px;
        padding: 15px 20px;
        font-size: 1.1rem;
        font-weight: 600;
        color: #92400e;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow:
            0 4px 8px rgba(245, 158, 11, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    .amber-input:focus {
        border-color: #d97706;
        box-shadow:
            0 0 0 4px rgba(245, 158, 11, 0.2),
            0 8px 16px rgba(245, 158, 11, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
        outline: none;
    }

    .amber-label {
        color: #92400e;
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 10px;
        display: block;
        text-shadow: 0 1px 2px rgba(146, 64, 14, 0.1);
    }

    .luxury-btn {
        background: linear-gradient(145deg, #f59e0b, #d97706);
        border: none;
        border-radius: 50px;
        padding: 15px 35px;
        font-weight: 700;
        font-size: 1.1rem;
        color: white;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        box-shadow:
            0 8px 16px rgba(245, 158, 11, 0.3),
            0 4px 8px rgba(217, 119, 6, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .luxury-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .luxury-btn:hover::before {
        left: 100%;
    }

    .luxury-btn:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow:
            0 12px 24px rgba(245, 158, 11, 0.4),
            0 6px 12px rgba(217, 119, 6, 0.3);
    }

    .luxury-btn:active {
        transform: translateY(-1px) scale(1.02);
    }

    .secondary-btn {
        background: linear-gradient(145deg, #fef3c7, #fde68a);
        border: 2px solid #f59e0b;
        color: #92400e;
        border-radius: 50px;
        padding: 15px 35px;
        font-weight: 600;
        font-size: 1.1rem;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 8px rgba(245, 158, 11, 0.15);
    }

    .secondary-btn:hover {
        background: linear-gradient(145deg, #fde68a, #fcd34d);
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(245, 158, 11, 0.25);
        color: #78350f;
        text-decoration: none;
    }

    .luxury-alert {
        background: linear-gradient(145deg, #fef2f2, #fee2e2);
        border: 2px solid #ef4444;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 8px 16px rgba(239, 68, 68, 0.15);
    }

    .luxury-alert strong {
        color: #dc2626;
        font-size: 1.2rem;
    }

    .luxury-alert ul {
        margin: 10px 0 0 0;
        padding-left: 20px;
    }

    .luxury-alert li {
        color: #b91c1c;
        font-weight: 500;
        margin: 5px 0;
    }

    .golden-bg {
        background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 25%, #fde68a 50%, #fcd34d 75%, #fbbf24 100%);
        min-height: 100vh;
        position: relative;
    }

    .golden-bg::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 80%, rgba(245, 158, 11, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(217, 119, 6, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }

    .form-container {
        position: relative;
        z-index: 1;
        max-width: 600px;
        margin: 0 auto;
        padding: 40px;
    }

    .icon-decoration {
        position: absolute;
        font-size: 2rem;
        opacity: 0.1;
        animation: float 6s ease-in-out infinite;
    }

    .icon-1 { top: 10%; left: 10%; animation-delay: 0s; }
    .icon-2 { top: 20%; right: 15%; animation-delay: 2s; }
    .icon-3 { bottom: 30%; left: 20%; animation-delay: 4s; }
    .icon-4 { bottom: 20%; right: 10%; animation-delay: 1s; }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        33% { transform: translateY(-20px) rotate(5deg); }
        66% { transform: translateY(-10px) rotate(-5deg); }
    }
</style>

<div class="golden-bg">
    <!-- Decorative Icons -->
    <div class="icon-decoration icon-1">💎</div>
    <div class="icon-decoration icon-2">✨</div>
    <div class="icon-decoration icon-3">🏆</div>
    <div class="icon-decoration icon-4">👑</div>

    <div class="form-container">
        <div class="luxury-card">
            <div style="padding: 40px;">
                <h2 class="golden-title text-center mb-4">Update Stok Barang</h2>

                @if ($errors->any())
                    <div class="luxury-alert">
                        <strong>🚨 Oops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.data.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-4">
                        <label for="stok" class="amber-label">📦 Jumlah Stok</label>
                        <input type="number"
                               name="stok"
                               id="stok"
                               class="form-control amber-input w-100"
                               value="{{ old('stok', $data->stok) }}"
                               min="1"
                               max="9999"
                               placeholder="Masukkan jumlah stok..."
                               required>
                    </div>

                    <div class="text-center mt-4" style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                        <button type="submit" class="luxury-btn">
                            🚀 Update Stok
                        </button>
                        <a href="{{ route('admin.data.index') }}" class="secondary-btn">
                            🔙 Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Menambahkan efek interaktif pada form
document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('stok');
    const card = document.querySelector('.luxury-card');

    // Efek saat input focus
    input.addEventListener('focus', function() {
        card.style.transform = 'scale(1.02)';
        card.style.boxShadow = '0 25px 50px rgba(245, 158, 11, 0.25), 0 15px 30px rgba(217, 119, 6, 0.15)';
    });

    input.addEventListener('blur', function() {
        card.style.transform = 'scale(1)';
        card.style.boxShadow = '0 20px 40px rgba(245, 158, 11, 0.15), 0 10px 20px rgba(217, 119, 6, 0.1)';
    });

    // Efek partikel emas saat submit
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        createGoldenParticles();
    });

    function createGoldenParticles() {
        for (let i = 0; i < 20; i++) {
            const particle = document.createElement('div');
            particle.innerHTML = '✨';
            particle.style.position = 'fixed';
            particle.style.left = Math.random() * window.innerWidth + 'px';
            particle.style.top = Math.random() * window.innerHeight + 'px';
            particle.style.fontSize = Math.random() * 20 + 10 + 'px';
            particle.style.color = '#fbbf24';
            particle.style.pointerEvents = 'none';
            particle.style.zIndex = '9999';
            particle.style.animation = 'sparkleEffect 2s ease-out forwards';

            document.body.appendChild(particle);

            setTimeout(() => {
                particle.remove();
            }, 2000);
        }
    }

    // Tambahkan CSS untuk animasi partikel
    const style = document.createElement('style');
    style.textContent = `
        @keyframes sparkleEffect {
            0% {
                transform: scale(0) rotate(0deg);
                opacity: 1;
            }
            50% {
                transform: scale(1) rotate(180deg);
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
