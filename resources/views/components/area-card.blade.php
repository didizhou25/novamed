@props(['title', 'items' => [], 'icon' => null])

<div
    {{ $attributes->merge(['class' => 'group rounded-2xl border border-ink-900/8 bg-white p-8 transition-all duration-500 ease-out hover:-translate-y-1.5 hover:border-brand-300 hover:shadow-[0_24px_60px_-30px_rgba(16,38,42,0.4)]']) }}
>
    @if ($icon)
        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-50 text-brand-600 transition-colors duration-500 group-hover:bg-brand-600 group-hover:text-white">
            {{ $icon }}
        </span>
    @endif
    <h3 class="{{ $icon ? 'mt-5' : '' }} font-serif text-xl text-ink-950">{{ $title }}</h3>
    <p class="mt-3 text-sm leading-relaxed text-ink-700">
        {{ $slot }}
    </p>
    @if (count($items))
        <ul class="mt-5 space-y-2 border-t border-ink-900/8 pt-5">
            @foreach ($items as $item)
                <li class="flex items-start gap-2 text-sm text-ink-700">
                    <span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-brand-500"></span>
                    <span>{{ $item }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>
