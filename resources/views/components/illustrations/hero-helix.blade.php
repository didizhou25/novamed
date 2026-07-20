{{-- Hero illustration: a DNA double helix with leaf accents — science meeting life, matching the brand mark --}}
<svg
    {{ $attributes->merge(['class' => 'h-full w-full']) }}
    viewBox="0 0 400 560"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
    aria-hidden="true"
    data-reveal="fade"
    data-reveal-delay="200"
>
    <defs>
        <linearGradient id="hero-dna-a" x1="140" y1="40" x2="260" y2="520" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="#7fbba9" />
            <stop offset="1" stop-color="#1a5046" />
        </linearGradient>
        <linearGradient id="hero-dna-b" x1="260" y1="40" x2="140" y2="520" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="#4e9c86" />
            <stop offset="1" stop-color="#143631" />
        </linearGradient>
        <linearGradient id="hero-leaf" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0" stop-color="#cfa96a" />
            <stop offset="1" stop-color="#9c7a48" />
        </linearGradient>
        <filter id="hero-helix-glow" x="-50%" y="-50%" width="200%" height="200%">
            <feGaussianBlur stdDeviation="22" />
        </filter>
    </defs>

    <circle cx="200" cy="280" r="60" fill="#7fbba9" opacity="0.25" filter="url(#hero-helix-glow)" />

    {{-- Orbit ring --}}
    <circle
        cx="200" cy="280" r="188"
        stroke="currentColor" stroke-width="1" stroke-dasharray="1 8" stroke-linecap="round"
        class="text-brand-300 animate-spin-slow"
        style="transform-origin:200px 280px"
    />

    {{-- Helix strands --}}
    <path
        d="M140,40 C200,100 200,100 260,160 C200,220 200,220 140,280 C200,340 200,340 260,400 C200,460 200,460 140,520"
        stroke="url(#hero-dna-a)" stroke-width="4" stroke-linecap="round"
        class="draw-path" style="--path-length:950"
    />
    <path
        d="M260,40 C200,100 200,100 140,160 C200,220 200,220 260,280 C200,340 200,340 140,400 C200,460 200,460 260,520"
        stroke="url(#hero-dna-b)" stroke-width="4" stroke-linecap="round" opacity="0.85"
        class="draw-path" style="--path-length:950; --reveal-delay:150ms"
    />

    {{-- Base-pair rungs --}}
    @foreach ([40, 160, 280, 400, 520] as $i => $y)
        <g data-reveal="scale" data-reveal-delay="{{ 500 + $i * 120 }}">
            <line x1="140" y1="{{ $y }}" x2="260" y2="{{ $y }}" stroke="currentColor" stroke-width="1.5" class="text-gold-400/70" />
            <circle cx="140" cy="{{ $y }}" r="6" fill="currentColor" class="text-brand-500" />
            <circle cx="260" cy="{{ $y }}" r="6" fill="currentColor" class="text-gold-500" />
        </g>
    @endforeach

    {{-- Leaf accents --}}
    <g class="animate-float-y-slow" style="animation-delay:.2s">
        <path d="M330,120 C356,116 362,92 350,72 C340,88 332,93 328,106 C326,111 328,116 330,120 Z" fill="url(#hero-leaf)" />
    </g>
    <g class="animate-float-y-slow" style="animation-delay:1s">
        <path d="M62,460 C36,456 30,432 42,412 C52,428 60,433 64,446 C66,451 64,456 62,460 Z" fill="url(#hero-leaf)" />
    </g>
</svg>
