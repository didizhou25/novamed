@php
    $navItems = [
        'home' => ['label' => 'Home', 'route' => 'home'],
        'over-ons' => ['label' => 'Over ons', 'route' => 'over-ons'],
        'onderzoek' => ['label' => 'Onderzoek', 'route' => 'onderzoek'],
        'toekomst' => ['label' => 'Toekomst', 'route' => 'toekomst'],
        'contact' => ['label' => 'Contact', 'route' => 'contact'],
    ];
@endphp

<header data-site-header class="sticky top-0 z-50 border-b border-ink-900/5 bg-sand-50/90 backdrop-blur">
    <div class="container-page flex h-20 items-center justify-between">
        <a href="{{ route('home') }}" class="group flex items-center gap-3">
            <span class="flex h-10 w-10 items-center justify-center rounded-full bg-white text-ink-950 shadow-[0_2px_10px_-4px_rgba(11,26,28,0.25)] ring-1 ring-ink-900/8 transition-transform duration-500 group-hover:scale-110">
                <x-brand-mark class="h-6 w-6" />
            </span>
            <span class="leading-tight">
                <span class="block font-serif text-lg font-medium tracking-tight text-ink-950">NovaMed</span>
                <span class="block text-[0.65rem] font-semibold tracking-[0.18em] text-brand-600 uppercase">Research Foundation</span>
            </span>
        </a>

        <nav class="hidden items-center gap-10 lg:flex">
            @foreach ($navItems as $key => $item)
                <a
                    href="{{ route($item['route']) }}"
                    class="nav-link text-sm font-medium transition {{ request()->routeIs($item['route']) ? 'is-active text-ink-950' : 'text-ink-700 hover:text-ink-950' }}"
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="hidden lg:block">
            <a
                href="{{ route('contact', ['type' => 'donateur']) }}"
                class="btn-shine inline-flex items-center rounded-full bg-ink-950 px-5 py-2.5 text-sm font-semibold text-sand-50 transition hover:bg-brand-800"
            >
                Steun het onderzoek
            </a>
        </div>

        <button
            type="button"
            data-menu-toggle
            aria-expanded="false"
            aria-label="Menu openen"
            class="flex h-10 w-10 items-center justify-center rounded-full border border-ink-900/10 lg:hidden"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-ink-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                <path class="menu-line menu-line-top" stroke-linecap="round" d="M3.75 6.75h16.5" />
                <path class="menu-line menu-line-mid" stroke-linecap="round" d="M3.75 12h16.5" />
                <path class="menu-line menu-line-bottom" stroke-linecap="round" d="M3.75 17.25h16.5" />
            </svg>
        </button>
    </div>

    <div data-mobile-menu class="hidden flex-col gap-1 border-t border-ink-900/5 bg-sand-50 px-6 pb-6 pt-2 lg:hidden">
        @foreach ($navItems as $key => $item)
            <a
                href="{{ route($item['route']) }}"
                class="rounded-lg px-3 py-3 text-sm font-medium {{ request()->routeIs($item['route']) ? 'bg-ink-900/5 text-ink-950' : 'text-ink-700' }}"
            >
                {{ $item['label'] }}
            </a>
        @endforeach
        <a
            href="{{ route('contact', ['type' => 'donateur']) }}"
            class="mt-2 inline-flex items-center justify-center rounded-full bg-ink-950 px-5 py-3 text-sm font-semibold text-sand-50"
        >
            Steun het onderzoek
        </a>
    </div>
</header>
