<x-layout :title="$title" :description="$description">

    <section class="relative overflow-hidden border-b border-ink-900/8 bg-white">
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute -top-16 right-[-4rem] h-72 w-72 rounded-full bg-brand-100/70 blur-3xl animate-drift"></div>
        </div>
        <div class="container-page relative py-20">
            <p class="eyebrow" data-reveal>Over ons</p>
            <h1 class="mt-4 max-w-2xl font-serif text-4xl text-ink-950 sm:text-5xl" data-reveal data-reveal-delay="90">Missie, visie en kernwaarden</h1>
            <p class="prose-body mt-6 max-w-2xl text-lg" data-reveal data-reveal-delay="180">
                NovaMed Research Foundation is een onafhankelijke stichting voor medisch onderzoek. Wij handelen vanuit wetenschappelijke integriteit, transparantie en respect voor iedereen die aan ons onderzoek bijdraagt.
            </p>
        </div>
    </section>

    <section class="py-24">
        <div class="container-page grid gap-16 lg:grid-cols-2">
            <div data-reveal="left">
                <p class="eyebrow">Missie</p>
                <h2 class="mt-4 font-serif text-3xl text-ink-950">Baanbrekende innovatie, onafhankelijk onderzocht</h2>
                <div class="prose-body mt-6">
                    <p>
                        NovaMed Research Foundation versnelt de ontwikkeling van baanbrekende medische innovaties door onafhankelijk onderzoek uit te voeren naar regeneratieve geneeskunde, biofysische technologieën en gepersonaliseerde gezondheidszorg.
                    </p>
                    <p>
                        Ons doel is nieuwe inzichten te ontwikkelen die veilig, wetenschappelijk verantwoord en toegankelijk zijn voor toekomstige generaties.
                    </p>
                </div>
            </div>
            <div data-reveal="right">
                <p class="eyebrow">Visie</p>
                <h2 class="mt-4 font-serif text-3xl text-ink-950">Geneeskunde als multidisciplinair vakgebied</h2>
                <div class="prose-body mt-6">
                    <p>
                        Wij geloven dat de geneeskunde van de toekomst ontstaat door het combineren van biologie, natuurkunde, technologie en data.
                    </p>
                    <p>
                        NovaMed Research Foundation wil wereldwijd een toonaangevend onderzoekscentrum worden waar innovatieve ideeën zorgvuldig worden onderzocht, ongeacht of de uitkomst positief of negatief is.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-24">
        <div class="container-page">
            <p class="eyebrow" data-reveal>Waar wij voor staan</p>
            <h2 class="mt-4 max-w-xl font-serif text-3xl text-ink-950" data-reveal data-reveal-delay="80">Kernwaarden</h2>

            @php
                $values = [
                    ['title' => 'Wetenschappelijke integriteit', 'text' => 'Onderzoek voeren wij eerlijk, zorgvuldig en controleerbaar uit — ongeacht de uitkomst.'],
                    ['title' => 'Innovatie', 'text' => 'Wij verkennen nieuwe combinaties van biologie, natuurkunde, technologie en data.'],
                    ['title' => 'Transparantie', 'text' => 'Wij zijn open over onze methoden, onze resultaten en het experimentele karakter van ons werk.'],
                    ['title' => 'Veiligheid van deelnemers', 'text' => 'De veiligheid van iedereen die deelneemt aan onderzoek staat te allen tijde voorop.'],
                    ['title' => 'Respect voor de mens', 'text' => 'Iedere deelnemer, donateur en partner wordt met zorg en respect behandeld.'],
                    ['title' => 'Onafhankelijkheid', 'text' => 'Ons onderzoek staat los van commerciële belangen die de uitkomst zouden kunnen beïnvloeden.'],
                ];
            @endphp

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($values as $index => $value)
                    <div
                        class="group rounded-2xl border border-ink-900/8 p-8 transition-all duration-500 hover:-translate-y-1.5 hover:border-gold-400 hover:shadow-[0_24px_60px_-30px_rgba(184,147,90,0.4)]"
                        data-reveal data-reveal-delay="{{ $index * 90 }}"
                    >
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-gold-500/10 font-serif text-sm text-gold-600">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>
                        <h3 class="mt-5 font-serif text-lg text-ink-950">{{ $value['title'] }}</h3>
                        <p class="mt-3 text-sm leading-relaxed text-ink-700">{{ $value['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-cta-band eyebrow="Meer weten" title="Ontdek waar wij momenteel onderzoek naar doen">
        <a href="{{ route('onderzoek') }}" class="btn-shine inline-flex items-center rounded-full bg-sand-50 px-6 py-3 text-sm font-semibold text-ink-950 transition hover:bg-brand-100">
            Bekijk ons onderzoek
        </a>
        <a href="{{ route('contact') }}" class="inline-flex items-center rounded-full border border-sand-50/30 px-6 py-3 text-sm font-semibold text-sand-50 transition hover:border-sand-50/60">
            Neem contact op
        </a>
    </x-cta-band>

</x-layout>
