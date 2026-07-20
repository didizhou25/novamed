@props(['title'])

<div {{ $attributes->merge(['class' => 'group flex items-center gap-3 rounded-full border border-ink-900/10 bg-white px-6 py-3.5 shadow-[0_1px_2px_rgba(16,38,42,0.04)] transition-all duration-500 ease-out hover:-translate-y-1 hover:border-gold-400/60 hover:shadow-[0_20px_45px_-24px_rgba(184,147,90,0.6)]']) }}>
    <span class="relative flex h-2.5 w-2.5 shrink-0 items-center justify-center">
        <span class="absolute h-2.5 w-2.5 rounded-full bg-gold-400 opacity-0 blur-[4px] transition-opacity duration-500 group-hover:opacity-100"></span>
        <span class="relative h-2 w-2 rounded-full bg-gradient-to-br from-gold-400 to-gold-600"></span>
    </span>
    <span class="text-[0.9rem] font-medium tracking-wide text-ink-900">{{ $title }}</span>
</div>
