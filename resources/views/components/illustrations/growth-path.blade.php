{{-- Decorative ascending path illustration symbolising the ten-year ambition --}}
<svg
    {{ $attributes->merge(['class' => 'h-full w-full']) }}
    viewBox="0 0 600 240"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
    aria-hidden="true"
    data-reveal="fade"
>
    <polyline
        points="20,210 140,190 230,150 320,155 410,95 500,70 580,25"
        stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"
        class="text-brand-400 draw-path"
        style="--path-length:604"
    />

    @foreach ([['20','210','0ms'], ['140','190','120ms'], ['230','150','240ms'], ['320','155','360ms'], ['410','95','480ms'], ['500','70','600ms'], ['580','25','720ms']] as [$x, $y, $delay])
        <circle
            cx="{{ $x }}" cy="{{ $y }}" r="5"
            fill="currentColor" class="text-gold-500 animate-pulse-soft"
            style="animation-delay: {{ $delay }}"
        />
    @endforeach
</svg>
