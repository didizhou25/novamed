<x-layout :title="$title" :description="$description">

    <section class="relative overflow-hidden border-b border-ink-900/8 bg-white">
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute -top-20 left-[-4rem] h-72 w-72 rounded-full bg-brand-100/70 blur-3xl animate-drift"></div>
        </div>
        <div class="container-page relative py-20">
            <p class="eyebrow" data-reveal>Onderzoek</p>
            <h1 class="mt-4 max-w-2xl font-serif text-4xl text-ink-950 sm:text-5xl" data-reveal data-reveal-delay="90">Hoe wij onderzoek doen</h1>
            <p class="prose-body mt-6 max-w-2xl text-lg" data-reveal data-reveal-delay="180">
                Van onderzoeksprogramma&rsquo;s en samenwerkingen tot de onderwerpen die wij bestuderen en de manier waarop een onderzoekstraject eruitziet.
            </p>
        </div>
    </section>

    {{-- Bedrijfsmodel --}}
    <section id="programmas" class="py-24">
        <div class="container-page">
            <p class="eyebrow" data-reveal>Bedrijfsmodel</p>
            <h2 class="mt-4 max-w-xl font-serif text-3xl text-ink-950" data-reveal data-reveal-delay="80">Vier manieren waarop wij werken</h2>

            <div class="mt-12 grid gap-6 sm:grid-cols-2">
                <x-pillar-card number="01" title="Onderzoeksprogramma’s" data-reveal data-reveal-delay="0">
                    <x-slot:icon><x-icons.flask class="h-5 w-5" /></x-slot:icon>
                    Vrijwilligers kunnen deelnemen aan innovatieve onderzoeksprojecten waarin nieuwe technologieën worden geëvalueerd onder vooraf vastgestelde onderzoeksprotocollen.
                </x-pillar-card>
                <x-pillar-card number="02" title="Donateursprogramma" data-reveal data-reveal-delay="90">
                    <x-slot:icon><x-icons.heart class="h-5 w-5" /></x-slot:icon>
                    Vermogende particulieren, families en bedrijven kunnen het onderzoek financieel ondersteunen. Donaties worden gebruikt voor apparatuur, onderzoekers, laboratoriumwerk en publicatie van resultaten.
                </x-pillar-card>
                <x-pillar-card number="03" title="Innovatiepartners" data-reveal data-reveal-delay="180">
                    <x-slot:icon><x-icons.partners class="h-5 w-5" /></x-slot:icon>
                    Samenwerking met universiteiten, artsen, ingenieurs en technologiebedrijven voor de ontwikkeling en evaluatie van nieuwe medische technologie.
                </x-pillar-card>
                <x-pillar-card number="04" title="Kenniscentrum" data-reveal data-reveal-delay="270">
                    <x-slot:icon><x-icons.book class="h-5 w-5" /></x-slot:icon>
                    Publicatie van onderzoeksresultaten, conferenties, opleidingen en open wetenschappelijke samenwerking.
                </x-pillar-card>
            </div>
        </div>
    </section>

    {{-- Onderzoeksgebieden --}}
    <section id="onderzoeksgebieden" class="bg-white py-24">
        <div class="container-page">
            <p class="eyebrow" data-reveal>Mogelijke onderzoeksgebieden</p>
            <h2 class="mt-4 max-w-2xl font-serif text-3xl text-ink-950" data-reveal data-reveal-delay="80">Waar wij onderzoek naar doen</h2>
            <p class="prose-body mt-4 max-w-2xl" data-reveal data-reveal-delay="140">
                Wij nemen alleen onderwerpen op waarvoor wij onderzoek willen doen — zonder vooraf te stellen dat ze werken.
            </p>

            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <x-area-card title="Regeneratieve geneeskunde" :items="['Celherstel', 'Weefselregeneratie', 'Herstelprocessen']" data-reveal data-reveal-delay="0">
                    <x-slot:icon><x-icons.cell class="h-5 w-5" /></x-slot:icon>
                </x-area-card>
                <x-area-card title="Lichttherapie" :items="['Fotobiomodulatie', 'Verschillende golflengten', 'Invloed op cellulaire processen']" data-reveal data-reveal-delay="90">
                    <x-slot:icon><x-icons.sun-rays class="h-5 w-5" /></x-slot:icon>
                </x-area-card>
                <x-area-card title="Biofysische stimulatie" :items="['Interacties tussen fysieke energie en biologische systemen', 'Effecten op herstel en welzijn']" data-reveal data-reveal-delay="180">
                    <x-slot:icon><x-icons.pulse class="h-5 w-5" /></x-slot:icon>
                </x-area-card>
                <x-area-card title="Gepersonaliseerde gezondheidszorg" :items="['AI', 'Biomarkers', 'Individuele behandelstrategieën']" data-reveal data-reveal-delay="270">
                    <x-slot:icon><x-icons.node-grid class="h-5 w-5" /></x-slot:icon>
                </x-area-card>
                <x-area-card title="Leefstijlinterventies" :items="['Voeding', 'Beweging', 'Slaap', 'Stressmanagement']" data-reveal data-reveal-delay="360">
                    <x-slot:icon><x-icons.leaf class="h-5 w-5" /></x-slot:icon>
                </x-area-card>
            </div>
        </div>
    </section>

    {{-- Onderzoeksopzet --}}
    <section id="onderzoeksopzet" class="py-24">
        <div class="container-page">
            <p class="eyebrow" data-reveal>Voorbeeld onderzoeksopzet</p>
            <h2 class="mt-4 max-w-xl font-serif text-3xl text-ink-950" data-reveal data-reveal-delay="80">Wat een deelnemer doorloopt</h2>

            @php
                $steps = [
                    'Uitgebreide intake',
                    'Medische voorgeschiedenis',
                    'Laboratoriumonderzoek',
                    'Nulmeting',
                    'Onderzoeksinterventie volgens protocol',
                    'Periodieke metingen',
                    'Eindanalyse',
                    'Anonieme verwerking van de resultaten',
                ];
            @endphp

            <div class="relative mt-12">
                <div class="absolute top-5 bottom-5 left-[19px] w-px bg-ink-900/10" data-reveal="grow"></div>

                <ol class="space-y-8">
                    @foreach ($steps as $index => $step)
                        <li class="relative flex gap-6">
                            <span
                                class="relative z-10 flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-ink-950 text-sm font-semibold text-sand-50"
                                data-reveal="scale" data-reveal-delay="{{ $index * 100 }}"
                            >
                                {{ $index + 1 }}
                            </span>
                            <div class="pt-2" data-reveal="right" data-reveal-delay="{{ $index * 100 + 60 }}">
                                <p class="font-medium text-ink-950">{{ $step }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </section>

    {{-- Ethics / important --}}
    <section class="bg-white py-24">
        <div class="container-page" data-reveal="scale">
            <x-notice title="Belangrijk">
                <p>
                    Wij doen onderzoek met mensen. Daarom houden wij ons aan wet- en regelgeving, waaronder ethische toetsing, geïnformeerde toestemming en veiligheidseisen.
                </p>
                <p>
                    Onbewezen therapieën worden door NovaMed Research Foundation nooit als bewezen behandelingen aangeboden of gepresenteerd. Wij zijn transparant over het experimentele karakter van ons onderzoek — dat vormt de kern van onze werkwijze.
                </p>
            </x-notice>
        </div>
    </section>

    <x-cta-band eyebrow="Doe mee" title="Interesse in deelname, samenwerking of steun?">
        <a href="{{ route('contact', ['type' => 'vrijwilliger']) }}" class="btn-shine inline-flex items-center rounded-full bg-sand-50 px-6 py-3 text-sm font-semibold text-ink-950 transition hover:bg-brand-100">
            Deelnemen aan onderzoek
        </a>
        <a href="{{ route('contact', ['type' => 'partner']) }}" class="inline-flex items-center rounded-full border border-sand-50/30 px-6 py-3 text-sm font-semibold text-sand-50 transition hover:border-sand-50/60">
            Innovatiepartner worden
        </a>
    </x-cta-band>

</x-layout>
