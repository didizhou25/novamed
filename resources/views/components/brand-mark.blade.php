{{-- Brand emblem: a DNA helix (science) and a leaf (life/health) meeting at the initial "N" --}}
<svg {{ $attributes->merge(['class' => 'h-4 w-4']) }} viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <defs>
        <linearGradient id="brandmark-dna" x1="10" y1="14" x2="46" y2="70" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="#7fbba9" />
            <stop offset="1" stop-color="#206455" />
        </linearGradient>
        <linearGradient id="brandmark-leaf" x1="48" y1="34" x2="88" y2="88" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="#cfa96a" />
            <stop offset="1" stop-color="#9c7a48" />
        </linearGradient>
    </defs>

    {{-- DNA helix, upper-left --}}
    <path d="M22,15 Q35,29 22,43 Q9,57 22,71" stroke="url(#brandmark-dna)" stroke-width="3.8" stroke-linecap="round" />
    <path d="M36,15 Q23,29 36,43 Q49,57 36,71" stroke="url(#brandmark-dna)" stroke-width="3.8" stroke-linecap="round" opacity="0.8" />
    <line x1="22" y1="15" x2="36" y2="15" stroke="#fbf9f4" stroke-width="2.4" stroke-linecap="round" />
    <line x1="22" y1="43" x2="36" y2="43" stroke="#fbf9f4" stroke-width="2.4" stroke-linecap="round" />
    <line x1="22" y1="71" x2="36" y2="71" stroke="#fbf9f4" stroke-width="2.4" stroke-linecap="round" />

    {{-- Leaf, lower-right --}}
    <path
        d="M56,86 C82,83 89,57 76,36 C65,53 56,59 51,73 C49,79 52,83 56,86 Z"
        fill="url(#brandmark-leaf)"
    />
    <path d="M76,36 C65,53 56,59 51,73" stroke="#fbf9f4" stroke-opacity="0.55" stroke-width="1.6" stroke-linecap="round" fill="none" />

    {{-- Initial --}}
    <text x="50" y="66" text-anchor="middle" font-family="Fraunces, Georgia, serif" font-weight="600" font-size="42" fill="currentColor">N</text>
</svg>
