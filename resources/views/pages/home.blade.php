<x-layout :title="$title" :description="$description">

    {{-- Hero --}}
    <section class="relative overflow-hidden" data-parallax-hero>
        <div class="pointer-events-none absolute inset-0">
            <div data-parallax-layer="14" class="absolute top-10 right-[-6rem] h-96 w-96 rounded-full bg-brand-200/50 blur-3xl animate-drift"></div>
            <div data-parallax-layer="22" class="absolute bottom-[-4rem] left-[-4rem] h-72 w-72 rounded-full bg-gold-400/25 blur-3xl animate-drift-reverse"></div>
        </div>

        <div class="container-page relative grid gap-16 py-28 sm:py-36 lg:grid-cols-[1.15fr_0.85fr] lg:items-center lg:gap-10">
            <div>
                <p class="eyebrow" data-reveal data-reveal-delay="0">Onafhankelijke stichting voor medisch onderzoek</p>
                <h1 class="mt-6 max-w-3xl font-serif text-4xl leading-[1.1] text-ink-950 sm:text-5xl lg:text-[3.4rem]" data-reveal data-reveal-delay="90">
                    Medische innovatie vraagt om zorgvuldig, onafhankelijk onderzoek.
                </h1>
                <p class="prose-body mt-6 max-w-2xl text-lg" data-reveal data-reveal-delay="180">
                    NovaMed Research Foundation versnelt de ontwikkeling van baanbrekende medische innovaties door onafhankelijk onderzoek uit te voeren naar regeneratieve geneeskunde, biofysische technologieën en gepersonaliseerde gezondheidszorg. Ons doel: inzichten die veilig, wetenschappelijk verantwoord en toegankelijk zijn voor toekomstige generaties.
                </p>
                <div class="mt-10 flex flex-wrap items-center gap-4" data-reveal data-reveal-delay="270">
                    <a href="{{ route('onderzoek') }}" class="btn-shine inline-flex items-center rounded-full bg-ink-950 px-6 py-3 text-sm font-semibold text-sand-50 transition hover:bg-brand-800">
                        Ontdek ons onderzoek
                    </a>
                    <a href="{{ route('contact', ['type' => 'donateur']) }}" class="inline-flex items-center rounded-full border border-ink-900/15 px-6 py-3 text-sm font-semibold text-ink-950 transition hover:border-ink-900/30 hover:-translate-y-0.5">
                        Steun de stichting
                    </a>
                </div>
            </div>

            <div data-parallax-layer="6" class="relative mx-auto aspect-[5/7] w-full max-w-[19rem] text-brand-500">
                <x-illustrations.hero-helix />
            </div>
        </div>
    </section>

    {{-- Quick facts --}}
    <section class="border-y border-ink-900/8 bg-white">
        <div class="container-page grid grid-cols-2 gap-8 py-12 sm:grid-cols-4">
            <div data-reveal data-reveal-delay="0">
                <p class="font-serif text-3xl text-ink-950 tabular-nums"><span data-counter="5">0</span></p>
                <p class="mt-1 text-sm text-ink-700">Onderzoeksgebieden</p>
            </div>
            <div data-reveal data-reveal-delay="90">
                <p class="font-serif text-3xl text-ink-950 tabular-nums"><span data-counter="4">0</span></p>
                <p class="mt-1 text-sm text-ink-700">Programmapijlers</p>
            </div>
            <div data-reveal data-reveal-delay="180">
                <p class="font-serif text-3xl text-ink-950 tabular-nums"><span data-counter="6">0</span></p>
                <p class="mt-1 text-sm text-ink-700">Kernwaarden</p>
            </div>
            <div data-reveal data-reveal-delay="270">
                <p class="font-serif text-3xl text-ink-950 tabular-nums"><span data-counter="10" data-counter-suffix=" jr">0</span></p>
                <p class="mt-1 text-sm text-ink-700">Ambitiehorizon</p>
            </div>
        </div>
    </section>

    {{-- Missie / Visie --}}
    <section class="py-24">
        <div class="container-page grid gap-12 lg:grid-cols-2 lg:gap-16">
            <div data-reveal="left">
                <p class="eyebrow">Missie</p>
                <h2 class="mt-4 font-serif text-2xl text-ink-950 sm:text-3xl">Onafhankelijk onderzoek dat generaties verder helpt</h2>
                <p class="prose-body mt-4">
                    Wij voeren onafhankelijk onderzoek uit naar regeneratieve geneeskunde, biofysische technologieën en gepersonaliseerde gezondheidszorg — gericht op inzichten die veilig, wetenschappelijk verantwoord en toegankelijk zijn.
                </p>
            </div>
            <div data-reveal="right">
                <p class="eyebrow">Visie</p>
                <h2 class="mt-4 font-serif text-2xl text-ink-950 sm:text-3xl">De geneeskunde van de toekomst is multidisciplinair</h2>
                <p class="prose-body mt-4">
                    Wij geloven dat de geneeskunde van de toekomst ontstaat door het combineren van biologie, natuurkunde, technologie en data. NovaMed Research Foundation wil wereldwijd een toonaangevend onderzoekscentrum worden waar innovatieve ideeën zorgvuldig worden onderzocht — ongeacht of de uitkomst positief of negatief is.
                </p>
            </div>
        </div>
        <div class="container-page mt-8" data-reveal>
            <a href="{{ route('over-ons') }}" class="text-sm font-semibold text-brand-700 hover:text-brand-800">
                Lees meer over onze missie en kernwaarden &rarr;
            </a>
        </div>
    </section>

    {{-- Bedrijfsmodel pillars --}}
    <section class="relative overflow-hidden bg-white py-28 sm:py-32">
        <div class="pointer-events-none absolute -left-24 top-8 h-72 w-72 rounded-full bg-brand-50 blur-3xl"></div>
        <div class="pointer-events-none absolute -right-16 bottom-0 h-64 w-64 rounded-full bg-gold-50 opacity-70 blur-3xl"></div>

        <div class="container-page relative">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="eyebrow" data-reveal>Hoe wij werken</p>
                    <h2 class="mt-4 max-w-xl font-serif text-4xl text-ink-950 sm:text-5xl" data-reveal data-reveal-delay="80">Vier pijlers, één missie</h2>
                </div>
                <p class="max-w-sm text-sm leading-relaxed text-ink-700" data-reveal data-reveal-delay="140">
                    Onderzoek, financiering, samenwerking en kennisdeling komen samen in één doorlopende cyclus van vooruitgang.
                </p>
            </div>

            <div class="mt-16 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <x-pillar-card number="01" title="Onderzoeksprogramma’s" data-reveal data-reveal-delay="0">
                    <x-slot:icon><x-icons.flask class="h-5 w-5" /></x-slot:icon>
                    Vrijwilligers nemen deel aan innovatieve onderzoeksprojecten waarin nieuwe technologieën worden geëvalueerd onder vooraf vastgestelde protocollen.
                </x-pillar-card>
                <x-pillar-card number="02" title="Donateursprogramma" data-reveal data-reveal-delay="90">
                    <x-slot:icon><x-icons.heart class="h-5 w-5" /></x-slot:icon>
                    Vermogende particulieren, families en bedrijven ondersteunen het onderzoek financieel — voor apparatuur, onderzoekers, labwerk en publicatie.
                </x-pillar-card>
                <x-pillar-card number="03" title="Innovatiepartners" data-reveal data-reveal-delay="180">
                    <x-slot:icon><x-icons.partners class="h-5 w-5" /></x-slot:icon>
                    Samenwerking met universiteiten, artsen, ingenieurs en technologiebedrijven bij de ontwikkeling en evaluatie van nieuwe medische technologie.
                </x-pillar-card>
                <x-pillar-card number="04" title="Kenniscentrum" data-reveal data-reveal-delay="270">
                    <x-slot:icon><x-icons.book class="h-5 w-5" /></x-slot:icon>
                    Publicatie van onderzoeksresultaten, conferenties, opleidingen en open wetenschappelijke samenwerking.
                </x-pillar-card>
            </div>
        </div>
    </section>

    {{-- Kernwaarden preview --}}
    <section class="relative overflow-hidden py-28 sm:py-32">
        <div class="pointer-events-none absolute left-1/2 top-0 h-80 w-[36rem] -translate-x-1/2 rounded-full bg-gold-50 opacity-60 blur-3xl"></div>

        <div class="container-page relative">
            <div class="mx-auto max-w-2xl text-center">
                <p class="eyebrow" data-reveal>Waar wij voor staan</p>
                <h2 class="mt-4 font-serif text-4xl text-ink-950 sm:text-5xl" data-reveal data-reveal-delay="80">Kernwaarden</h2>
                <p class="prose-body mt-5 text-base" data-reveal data-reveal-delay="140">
                    De principes die ieder onderzoek, elke samenwerking en elke beslissing sturen.
                </p>
            </div>
            <div class="mt-14 flex flex-wrap justify-center gap-4">
                <x-value-pill title="Wetenschappelijke integriteit" data-reveal="scale" data-reveal-delay="0" />
                <x-value-pill title="Innovatie" data-reveal="scale" data-reveal-delay="60" />
                <x-value-pill title="Transparantie" data-reveal="scale" data-reveal-delay="120" />
                <x-value-pill title="Veiligheid van deelnemers" data-reveal="scale" data-reveal-delay="180" />
                <x-value-pill title="Respect voor de mens" data-reveal="scale" data-reveal-delay="240" />
                <x-value-pill title="Onafhankelijkheid" data-reveal="scale" data-reveal-delay="300" />
            </div>
        </div>
    </section>

    {{-- Research areas preview --}}
    <section class="bg-white py-24">
        <div class="container-page">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <div>
                    <p class="eyebrow" data-reveal>Onderzoeksgebieden</p>
                    <h2 class="mt-4 max-w-xl font-serif text-3xl text-ink-950" data-reveal data-reveal-delay="80">Waar wij onderzoek naar doen</h2>
                </div>
                <a href="{{ route('onderzoek') }}" class="text-sm font-semibold text-brand-700 hover:text-brand-800" data-reveal>
                    Alle onderzoeksgebieden &rarr;
                </a>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <x-area-card title="Regeneratieve geneeskunde" :items="['Celherstel', 'Weefselregeneratie', 'Herstelprocessen']" data-reveal data-reveal-delay="0">
                    <x-slot:icon><x-icons.cell class="h-5 w-5" /></x-slot:icon>
                    Onderzoek naar hoe het lichaam zichzelf herstelt en hoe dit proces ondersteund kan worden.
                </x-area-card>
                <x-area-card title="Lichttherapie" :items="['Fotobiomodulatie', 'Verschillende golflengten', 'Invloed op cellulaire processen']" data-reveal data-reveal-delay="90">
                    <x-slot:icon><x-icons.sun-rays class="h-5 w-5" /></x-slot:icon>
                    Studie naar de effecten van licht op cellulair niveau.
                </x-area-card>
                <x-area-card title="Biofysische stimulatie" :items="['Interacties tussen fysieke energie en biologische systemen', 'Effecten op herstel en welzijn']" data-reveal data-reveal-delay="180">
                    <x-slot:icon><x-icons.pulse class="h-5 w-5" /></x-slot:icon>
                    Onderzoek naar de wisselwerking tussen fysieke energie en het lichaam.
                </x-area-card>
                <x-area-card title="Gepersonaliseerde gezondheidszorg" :items="['AI', 'Biomarkers', 'Individuele behandelstrategieën']" data-reveal data-reveal-delay="270">
                    <x-slot:icon><x-icons.node-grid class="h-5 w-5" /></x-slot:icon>
                    Onderzoek naar op maat gemaakte inzichten op basis van individuele data.
                </x-area-card>
                <x-area-card title="Leefstijlinterventies" :items="['Voeding', 'Beweging', 'Slaap', 'Stressmanagement']" data-reveal data-reveal-delay="360">
                    <x-slot:icon><x-icons.leaf class="h-5 w-5" /></x-slot:icon>
                    Studie naar de invloed van leefstijl op gezondheid en herstel.
                </x-area-card>
            </div>
        </div>
    </section>

    {{-- Ethics notice --}}
    <section class="py-24">
        <div class="container-page" data-reveal="scale">
            <x-notice title="Experimenteel karakter van ons onderzoek">
                <p>
                    NovaMed Research Foundation onderzoekt onderwerpen zonder vooraf te stellen dat ze werken. Onderzochte methoden zijn geen bewezen behandelingen en worden nooit als zodanig gepresenteerd. Deelname vindt plaats volgens vastgestelde protocollen, met ethische toetsing, geïnformeerde toestemming en aandacht voor veiligheid.
                </p>
            </x-notice>
        </div>
    </section>

    <x-cta-band eyebrow="Doe mee" title="Wilt u deelnemen, doneren of samenwerken?">
        <a href="{{ route('contact', ['type' => 'vrijwilliger']) }}" class="btn-shine inline-flex items-center rounded-full bg-sand-50 px-6 py-3 text-sm font-semibold text-ink-950 transition hover:bg-brand-100">
            Deelnemen aan onderzoek
        </a>
        <a href="{{ route('contact', ['type' => 'donateur']) }}" class="inline-flex items-center rounded-full border border-sand-50/30 px-6 py-3 text-sm font-semibold text-sand-50 transition hover:border-sand-50/60">
            Doneren
        </a>
        <a href="{{ route('contact', ['type' => 'partner']) }}" class="inline-flex items-center rounded-full border border-sand-50/30 px-6 py-3 text-sm font-semibold text-sand-50 transition hover:border-sand-50/60">
            Innovatiepartner worden
        </a>
    </x-cta-band>

</x-layout>
