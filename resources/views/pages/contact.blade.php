<x-layout :title="$title" :description="$description">

    @php
        $types = [
            'algemeen' => 'Algemene vraag',
            'donateur' => 'Doneren / financieel steunen',
            'vrijwilliger' => 'Deelnemen aan onderzoek',
            'partner' => 'Innovatiepartner worden',
        ];
    @endphp

    <section class="relative overflow-hidden border-b border-ink-900/8 bg-white">
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute -top-20 right-[-4rem] h-72 w-72 rounded-full bg-brand-100/70 blur-3xl animate-drift"></div>
        </div>
        <div class="container-page relative py-20">
            <p class="eyebrow" data-reveal>Contact</p>
            <h1 class="mt-4 max-w-2xl font-serif text-4xl text-ink-950 sm:text-5xl" data-reveal data-reveal-delay="90">Neem contact met ons op</h1>
            <p class="prose-body mt-6 max-w-2xl text-lg" data-reveal data-reveal-delay="180">
                Of u nu wilt deelnemen aan onderzoek, het werk van de stichting financieel wilt steunen, wilt samenwerken als innovatiepartner, of gewoon een vraag heeft — wij horen graag van u.
            </p>
        </div>
    </section>

    <section class="py-24">
        <div class="container-page grid gap-16 lg:grid-cols-[0.9fr_1.1fr]">

            <div data-reveal="left">
                <h2 class="font-serif text-2xl text-ink-950">Direct contact</h2>
                <ul class="prose-body mt-6 space-y-4">
                    <li>
                        <span class="block text-sm font-semibold text-ink-950">E-mail</span>
                        <a href="mailto:info@novamedresearch.org" class="text-brand-700 hover:text-brand-800">info@novamedresearch.org</a>
                    </li>
                    <li>
                        <span class="block text-sm font-semibold text-ink-950">Locatie</span>
                        Nederland
                    </li>
                </ul>

                <div class="mt-10">
                    <x-notice title="Belangrijk">
                        <p>
                            NovaMed Research Foundation voert experimenteel onderzoek uit. Onderzochte methoden zijn geen bewezen behandelingen. Deelname aan onderzoek verloopt altijd via een vastgesteld protocol, met ethische toetsing en geïnformeerde toestemming.
                        </p>
                    </x-notice>
                </div>
            </div>

            <div class="rounded-2xl border border-ink-900/8 bg-white p-8 sm:p-10" data-reveal="right">
                <div data-form-feedback>
                    @if (session('status'))
                        <div class="animate-fade-in-down mb-6 rounded-xl border border-brand-300 bg-brand-50 px-5 py-4 text-sm text-brand-800">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="animate-fade-in-down mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
                            <p class="font-semibold">Controleer de volgende velden:</p>
                            <ul class="mt-2 list-inside list-disc space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-6" data-contact-form>
                    @csrf

                    {{-- Honeypot --}}
                    <div class="hidden" aria-hidden="true">
                        <label for="website">Website</label>
                        <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-ink-900">Waar gaat uw bericht over?</label>
                        <div class="mt-3 grid grid-cols-1 gap-3 sm:grid-cols-2">
                            @foreach ($types as $value => $label)
                                <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-ink-900/10 px-4 py-3 text-sm transition-all duration-300 hover:border-brand-300 has-[:checked]:border-brand-500 has-[:checked]:bg-brand-50 has-[:checked]:shadow-[0_10px_25px_-16px_rgba(32,100,85,0.6)]">
                                    <input
                                        type="radio"
                                        name="type"
                                        value="{{ $value }}"
                                        class="h-4 w-4 border-ink-900/30 text-brand-600 focus:ring-brand-500"
                                        {{ old('type', $selectedType) === $value ? 'checked' : '' }}
                                    >
                                    {{ $label }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <label for="name" class="text-sm font-medium text-ink-900">Naam</label>
                            <input
                                type="text" name="name" id="name" value="{{ old('name') }}" required
                                class="mt-2 w-full rounded-xl border border-ink-900/15 px-4 py-3 text-sm transition-colors duration-300 focus:border-brand-500 focus:ring-brand-500"
                            >
                        </div>
                        <div>
                            <label for="email" class="text-sm font-medium text-ink-900">E-mailadres</label>
                            <input
                                type="email" name="email" id="email" value="{{ old('email') }}" required
                                class="mt-2 w-full rounded-xl border border-ink-900/15 px-4 py-3 text-sm transition-colors duration-300 focus:border-brand-500 focus:ring-brand-500"
                            >
                        </div>
                    </div>

                    <div>
                        <label for="organisation" class="text-sm font-medium text-ink-900">Organisatie <span class="font-normal text-ink-700">(optioneel)</span></label>
                        <input
                            type="text" name="organisation" id="organisation" value="{{ old('organisation') }}"
                            class="mt-2 w-full rounded-xl border border-ink-900/15 px-4 py-3 text-sm transition-colors duration-300 focus:border-brand-500 focus:ring-brand-500"
                        >
                    </div>

                    <div>
                        <label for="message" class="text-sm font-medium text-ink-900">Bericht</label>
                        <textarea
                            name="message" id="message" rows="5" required
                            class="mt-2 w-full rounded-xl border border-ink-900/15 px-4 py-3 text-sm transition-colors duration-300 focus:border-brand-500 focus:ring-brand-500"
                        >{{ old('message') }}</textarea>
                    </div>

                    <button
                        type="submit"
                        class="btn-shine inline-flex w-full items-center justify-center rounded-full bg-ink-950 px-6 py-3.5 text-sm font-semibold text-sand-50 transition hover:bg-brand-800 sm:w-auto"
                    >
                        Bericht versturen
                    </button>
                </form>
            </div>
        </div>
    </section>

</x-layout>
