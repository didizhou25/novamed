@props(['title' => 'Belangrijk'])

<div {{ $attributes->merge(['class' => 'rounded-2xl border border-gold-500/30 bg-gold-500/8 p-8']) }}>
    <div class="flex items-start gap-4">
        <span class="mt-1 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-gold-500/20 text-gold-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z" />
            </svg>
        </span>
        <div>
            <h3 class="font-serif text-lg text-ink-950">{{ $title }}</h3>
            <div class="prose-body mt-2 text-sm">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
