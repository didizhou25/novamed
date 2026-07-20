<footer class="relative overflow-hidden border-t border-ink-900/10 bg-ink-950 text-sand-100">
    <div class="pointer-events-none absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-brand-400/60 to-transparent"></div>

    <div class="container-page grid gap-12 py-16 lg:grid-cols-[1.3fr_1fr_1fr_1fr]">
        <div>
            <div class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-full bg-sand-50 text-ink-950">
                    <x-brand-mark class="h-6 w-6" />
                </span>
                <span class="font-serif text-lg font-medium text-sand-50">NovaMed Research Foundation</span>
            </div>
            <p class="mt-4 max-w-sm text-sm leading-relaxed text-sand-100/70">
                Onafhankelijk onderzoek naar regeneratieve geneeskunde, biofysische technologieën en gepersonaliseerde gezondheidszorg — met wetenschappelijke integriteit als uitgangspunt.
            </p>
        </div>

        <div>
            <p class="text-xs font-semibold tracking-[0.18em] text-sand-100/50 uppercase">Navigatie</p>
            <ul class="mt-4 space-y-3 text-sm text-sand-100/80">
                <li><a href="{{ route('over-ons') }}" class="hover:text-sand-50">Over ons</a></li>
                <li><a href="{{ route('onderzoek') }}" class="hover:text-sand-50">Onderzoek</a></li>
                <li><a href="{{ route('toekomst') }}" class="hover:text-sand-50">Toekomst</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-sand-50">Contact</a></li>
            </ul>
        </div>

        <div>
            <p class="text-xs font-semibold tracking-[0.18em] text-sand-100/50 uppercase">Betrokken raken</p>
            <ul class="mt-4 space-y-3 text-sm text-sand-100/80">
                <li><a href="{{ route('contact', ['type' => 'vrijwilliger']) }}" class="hover:text-sand-50">Deelnemen aan onderzoek</a></li>
                <li><a href="{{ route('contact', ['type' => 'donateur']) }}" class="hover:text-sand-50">Doneren</a></li>
                <li><a href="{{ route('contact', ['type' => 'partner']) }}" class="hover:text-sand-50">Innovatiepartner worden</a></li>
            </ul>
        </div>

        <div>
            <p class="text-xs font-semibold tracking-[0.18em] text-sand-100/50 uppercase">Contact</p>
            <ul class="mt-4 space-y-3 text-sm text-sand-100/80">
                <li><a href="mailto:info@novamedresearch.org" class="hover:text-sand-50">info@novamedresearch.org</a></li>
                <li>Nederland</li>
            </ul>
        </div>
    </div>

    <div class="border-t border-sand-50/10">
        <div class="container-page py-6">
            <p class="text-xs leading-relaxed text-sand-100/50">
                NovaMed Research Foundation voert experimenteel, wetenschappelijk onderzoek uit. Onderzochte methoden zijn geen bewezen behandelingen en worden nooit als zodanig gepresenteerd. Deelname aan onderzoeksprogramma&rsquo;s vindt plaats op basis van vooraf vastgestelde protocollen, ethische toetsing en geïnformeerde toestemming.
            </p>
            <p class="mt-3 text-xs text-sand-100/40">
                &copy; {{ now()->year }} NovaMed Research Foundation. Alle rechten voorbehouden.
            </p>
        </div>
    </div>
</footer>
