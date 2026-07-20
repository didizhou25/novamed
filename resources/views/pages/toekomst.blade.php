<x-layout :title="$title" :description="$description">

    <section class="relative overflow-hidden border-b border-ink-900/8 bg-white">
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute -bottom-24 right-[-4rem] h-72 w-72 rounded-full bg-gold-400/20 blur-3xl animate-drift-reverse"></div>
        </div>
        <div class="container-page relative grid gap-10 py-20 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
            <div>
                <p class="eyebrow" data-reveal>Toekomst</p>
                <h1 class="mt-4 max-w-2xl font-serif text-4xl text-ink-950 sm:text-5xl" data-reveal data-reveal-delay="90">Onze ambitie voor de komende tien jaar</h1>
                <p class="prose-body mt-6 max-w-2xl text-lg" data-reveal data-reveal-delay="180">
                    Binnen tien jaar wil NovaMed Research Foundation uitgroeien tot een internationaal, toonaangevend onderzoeksinstituut.
                </p>
            </div>
            <div class="hidden h-56 text-brand-500 lg:block" data-reveal="fade" data-reveal-delay="240">
                <x-illustrations.growth-path />
            </div>
        </div>
    </section>

    <section class="py-24">
        <div class="container-page">
            @php
                $goals = [
                    [
                        'title' => 'Internationaal onderzoeksinstituut',
                        'description' => 'Uitgroeien tot een internationaal erkend onderzoeksinstituut op het gebied van medische innovatie.',
                    ],
                    [
                        'title' => 'Samenwerking met universiteiten en ziekenhuizen',
                        'description' => 'Structurele samenwerkingsverbanden aangaan met academische en klinische instellingen.',
                    ],
                    [
                        'title' => 'Onafhankelijke evaluatie van nieuwe technologie',
                        'description' => 'Nieuwe medische technologieën onafhankelijk evalueren, los van commerciële belangen.',
                    ],
                    [
                        'title' => 'Publicatie in wetenschappelijke tijdschriften',
                        'description' => 'Onderzoeksresultaten publiceren in erkende, gerecenseerde wetenschappelijke tijdschriften.',
                    ],
                    [
                        'title' => 'Een open database met onderzoeksgegevens',
                        'description' => 'Een open database opbouwen zodat onderzoeksgegevens breed toegankelijk en herbruikbaar zijn.',
                    ],
                ];
            @endphp

            <div class="grid gap-6 lg:grid-cols-2">
                @foreach ($goals as $index => $goal)
                    <div
                        class="group rounded-2xl border border-ink-900/8 bg-white p-8 transition-all duration-500 hover:-translate-y-1.5 hover:border-brand-300 hover:shadow-[0_24px_60px_-30px_rgba(16,38,42,0.4)] {{ $index === 0 ? 'lg:col-span-2' : '' }}"
                        data-reveal data-reveal-delay="{{ $index * 90 }}"
                    >
                        <span class="font-serif text-2xl text-brand-400">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 class="mt-4 font-serif text-xl text-ink-950">{{ $goal['title'] }}</h3>
                        <p class="mt-3 text-sm leading-relaxed text-ink-700">{{ $goal['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white py-24">
        <div class="container-page" data-reveal="scale">
            <x-notice title="Een duurzame basis">
                <p>
                    Een stichting die transparant is over het experimentele karakter van haar onderzoek heeft doorgaans een veel sterkere en duurzamere basis. Daarom blijft transparantie — ook op weg naar onze langetermijndoelen — een uitgangspunt in alles wat wij doen.
                </p>
            </x-notice>
        </div>
    </section>

    <x-cta-band eyebrow="Bouw mee" title="Help ons deze ambitie waar te maken">
        <a href="{{ route('contact', ['type' => 'donateur']) }}" class="btn-shine inline-flex items-center rounded-full bg-sand-50 px-6 py-3 text-sm font-semibold text-ink-950 transition hover:bg-brand-100">
            Doneren
        </a>
        <a href="{{ route('contact', ['type' => 'partner']) }}" class="inline-flex items-center rounded-full border border-sand-50/30 px-6 py-3 text-sm font-semibold text-sand-50 transition hover:border-sand-50/60">
            Innovatiepartner worden
        </a>
    </x-cta-band>

</x-layout>
