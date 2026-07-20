@props(['number', 'title', 'icon' => null])

<div
    {{ $attributes->merge(['class' => 'group relative overflow-hidden rounded-3xl border border-ink-900/8 bg-white p-8 sm:p-9 transition-all duration-500 ease-out hover:-translate-y-2 hover:border-brand-300/70 hover:shadow-[0_32px_70px_-32px_rgba(16,38,42,0.45)]']) }}
>
    <div class="pointer-events-none absolute inset-x-0 top-0 h-[3px] origin-left scale-x-0 bg-gradient-to-r from-brand-500 via-brand-400 to-gold-400 transition-transform duration-500 ease-out group-hover:scale-x-100"></div>
    <div class="pointer-events-none absolute -top-12 -right-12 h-36 w-36 rounded-full bg-brand-100 opacity-0 blur-3xl transition-opacity duration-500 group-hover:opacity-80"></div>

    <div class="relative flex items-start justify-between">
        @if ($icon)
            <span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-600 to-brand-800 text-white shadow-[0_14px_30px_-16px_rgba(23,65,58,0.7)] transition-transform duration-500 ease-out group-hover:scale-110 group-hover:rotate-3">
                {{ $icon }}
            </span>
        @endif
        <span class="font-serif text-4xl italic text-brand-100 transition-colors duration-500 group-hover:text-brand-200">{{ $number }}</span>
    </div>

    <h3 class="relative mt-7 text-balance font-serif text-xl leading-snug text-ink-950 sm:text-2xl" style="hyphens: auto;" lang="nl">{{ $title }}</h3>
    <div class="relative mt-3 text-sm leading-relaxed text-ink-700">
        {{ $slot }}
    </div>
</div>
