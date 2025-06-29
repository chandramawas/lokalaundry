<x-layouts.app title="Tentang Kami">
  <br>
  <!-- Bubble Animation Overlay -->
  <div id="bubble-overlay" class="fixed inset-0 pointer-events-none z-0"></div>
  <x-ui.section-container id="about">
    <x-slot:title>
      <div class="relative flex items-center mb-4">
        <span class="text-gray-600 text-base mr-2">Selamat datang di</span>
        <span
          class="text-primary font-extrabold text-2xl tracking-wide bg-gradient-to-r from-primary to-blue-400 bg-clip-text drop-shadow-md">{{ config('app.name') }}</span>
        <!-- Bubble Animation Container -->
        <div class="absolute left-0 top-0 w-full h-24 pointer-events-none overflow-visible z-0">
          <span class="bubble absolute left-10 animate-bubble w-6 h-6 bg-blue-200 rounded-full opacity-70"></span>
          <span class="bubble absolute left-1/2 animate-bubble2 w-4 h-4 bg-blue-300 rounded-full opacity-60"></span>
          <span class="bubble absolute left-2/3 animate-bubble3 w-8 h-8 bg-blue-100 rounded-full opacity-50"></span>
          <span class="bubble absolute left-1/4 animate-bubble4 w-5 h-5 bg-blue-400 rounded-full opacity-40"></span>
        </div>
      </div>
    </x-slot:title>

    <div class="items-center">
      {{-- Desc --}}
      <div
        class="flex flex-col font-medium gap-6 text-gray-700 text-lg leading-relaxed text-justify animate-fade-in-up animate-infinite">
        <p class="font-semibold text-primary/90 tracking-wide animate-pulse">
          <span class="text-primary font-bold text-xl">{{ config('app.name') }}</span>
          hadir untuk menjawab kebutuhan mencuci pakaian secara mandiri tanpa harus memiliki mesin
          cuci sendiri. Kami adalah platform online yang memungkinkan Anda memesan penggunaan mesin cuci di
          laundry self-service secara praktis, cepat, dan terjadwal
        </p>
        <p class="font-medium text-slate-700/90 animate-fade-in animate-infinite animate-delay-200">
          Melalui sistem booking yang kami sediakan, Anda cukup memilih lokasi laundry, waktu yang sesuai, dan
          tipe mesin cuci yang diinginkan. Semua proses dilakukan secara online, tidak perlu menunggu lama.
        </p>
        <p class="font-medium text-slate-700/90 animate-fade-in animate-infinite animate-delay-400">
          Layanan kami sangat cocok untuk Anda yang tinggal di kos, apartemen, atau lingkungan dengan
          keterbatasan fasilitas mencuci. Dengan menggunakan layanan kami, Anda tetap bisa mencuci pakaian dengan nyaman
          dan efisien tanpa biaya besar.
        </p>
        <p class="font-medium text-slate-700/90 animate-fade-in animate-infinite animate-delay-600">
          Kami percaya bahwa mencuci pakaian seharusnya tidak merepotkan. Karena itu, kami hadir untuk membuat
          prosesnya lebih ringkas, hemat waktu, dan tetap dalam kendali Anda.
        </p>
      </div>
    </div>
  </x-ui.section-container>

  <x-ui.section-container id="feedback" title="Umpan Balik Pelanggan">
    <div class="max-h-[400px] overflow-hidden overflow-y-auto">
      <livewire:feedback-list />
    </div>
  </x-ui.section-container>

  <style>
    .bubble {
      position: absolute;
      border-radius: 50%;
      background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.7) 0%, rgba(173, 216, 230, 0.5) 60%, rgba(135, 206, 250, 0.3) 100%);
      box-shadow: 0 2px 12px 0 rgba(173, 216, 230, 0.2), 0 0 0 2px rgba(255, 255, 255, 0.2) inset;
      border: 1.5px solid rgba(255, 255, 255, 0.5);
      pointer-events: auto;
      transition: filter 0.2s;
    }

    .bubble-glossy {
      background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.9) 0%, rgba(173, 216, 230, 0.5) 60%, rgba(135, 206, 250, 0.3) 100%);
      box-shadow: 0 2px 12px 0 rgba(173, 216, 230, 0.2), 0 0 0 2px rgba(255, 255, 255, 0.2) inset, 0 0 8px 2px rgba(135, 206, 250, 0.15);
    }

    .bubble-pastel {
      background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.8) 0%, #b3e0ff 60%, #e0f7fa 100%);
    }

    .bubble-white {
      background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.95) 0%, #e0f7fa 100%);
    }

    @keyframes bubbleUp {
      0% {
        transform: translateY(0) scale(1);
        opacity: 0.7;
      }

      80% {
        opacity: 1;
      }

      100% {
        transform: translateY(-100vh) scale(1.15);
        opacity: 0;
      }
    }

    @keyframes pop {
      0% {
        opacity: 1;
        transform: scale(1);
      }

      80% {
        opacity: 1;
        transform: scale(1.2);
      }

      100% {
        opacity: 0;
        transform: scale(0.7);
      }
    }

    .bubble-pop {
      animation: pop 0.3s forwards;
      z-index: 50;
    }

    .bubble-particle {
      position: absolute;
      border-radius: 50%;
      pointer-events: none;
      opacity: 0.8;
      z-index: 60;
      animation: particlePop 0.5s forwards;
    }

    @keyframes particlePop {
      0% {
        opacity: 1;
        transform: scale(1) translateY(0);
      }

      100% {
        opacity: 0;
        transform: scale(0.5) translateY(-30px);
      }
    }
  </style>
</x-layouts.app>

<script>
  function randomBetween(a, b) { return a + Math.random() * (b - a); }
  function randomColorClass() {
    const arr = ['bubble-glossy', 'bubble-pastel', 'bubble-white'];
    return arr[Math.floor(Math.random() * arr.length)];
  }
  function spawnBubble() {
    const overlay = document.getElementById('bubble-overlay');
    if (!overlay) return;
    const bubble = document.createElement('span');
    const size = randomBetween(32, 80); // px
    const left = randomBetween(2, 95); // vw
    const dur = randomBetween(5, 12); // s
    bubble.className = `bubble ${randomColorClass()}`;
    bubble.style.width = `${size}px`;
    bubble.style.height = `${size}px`;
    bubble.style.left = `${left}vw`;
    bubble.style.bottom = `-80px`;
    bubble.style.animation = `bubbleUp ${dur}s linear forwards`;
    bubble.style.opacity = randomBetween(0.5, 0.85);
    bubble.addEventListener('animationend', () => bubble.remove());
    // Bubble pop on click/touch
    bubble.addEventListener('click', function (e) {
      e.stopPropagation();
      popBubble(bubble, left, size);
    });
    bubble.addEventListener('touchstart', function (e) {
      e.stopPropagation();
      popBubble(bubble, left, size);
    });
    // Bubble auto-pop (random chance)
    if (Math.random() < 0.35) { // 35% bubble auto-pop
      setTimeout(() => {
        if (document.body.contains(bubble)) popBubble(bubble, left, size);
      }, randomBetween(dur * 500, dur * 900));
    }
    overlay.appendChild(bubble);
  }
  function popBubble(bubble, left, size) {
    bubble.classList.add('bubble-pop');
    // Particle effect
    for (let i = 0; i < 7; i++) {
      const particle = document.createElement('span');
      particle.className = 'bubble-particle';
      const color = [
        'rgba(255,255,255,0.9)',
        'rgba(173,216,230,0.7)',
        'rgba(135,206,250,0.7)',
        'rgba(179,224,255,0.7)',
        'rgba(224,247,250,0.7)'
      ][Math.floor(Math.random() * 5)];
      particle.style.background = color;
      const psize = randomBetween(6, 16);
      particle.style.width = `${psize}px`;
      particle.style.height = `${psize}px`;
      particle.style.left = `${parseFloat(bubble.style.left) + randomBetween(-2, 2)}vw`;
      particle.style.top = `${bubble.getBoundingClientRect().top + window.scrollY}px`;
      particle.style.transform = `translateY(0) scale(1)`;
      particle.style.animationDelay = `${randomBetween(0, 0.1)}s`;
      document.body.appendChild(particle);
      setTimeout(() => particle.remove(), 500);
    }
    setTimeout(() => bubble.remove(), 300);
    setTimeout(spawnBubble, randomBetween(500, 1500));
  }
  function bubbleLoop() {
    for (let i = 0; i < 10; i++) setTimeout(spawnBubble, i * 600);
    setInterval(() => {
      if (document.getElementById('bubble-overlay')) spawnBubble();
    }, 1200);
  }
  document.addEventListener('DOMContentLoaded', bubbleLoop);
</script>