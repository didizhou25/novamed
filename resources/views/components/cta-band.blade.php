@props(['eyebrow' => null, 'title'])

<section class="relative overflow-hidden bg-ink-950">
    <div class="pointer-events-none absolute inset-0">
        <div class="absolute -top-24 left-1/4 h-72 w-72 rounded-full bg-brand-600/30 blur-3xl animate-drift"></div>
        <div class="absolute -bottom-24 right-1/4 h-72 w-72 rounded-full bg-gold-500/20 blur-3xl animate-drift-reverse"></div>
    </div>

    <div class="container-page relative py-20 text-center" data-reveal="fade">
        @if ($eyebrow)
            <p class="eyebrow !text-brand-300">{{ $eyebrow }}</p>
        @endif
        <h2 class="mx-auto mt-4 max-w-2xl font-serif text-3xl text-sand-50 sm:text-4xl">{{ $title }}</h2>
        <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
            {{ $slot }}
        </div>
    </div>
</section>
