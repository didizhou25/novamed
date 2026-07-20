<!doctype html>
<html lang="nl" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title.' — NovaMed Research Foundation' : 'NovaMed Research Foundation' }}</title>
    <meta name="description" content="{{ $description ?? 'NovaMed Research Foundation voert onafhankelijk onderzoek uit naar regeneratieve geneeskunde, biofysische technologieën en gepersonaliseerde gezondheidszorg.' }}">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ccircle cx='50' cy='50' r='48' fill='%23fbf9f4'/%3E%3Cpath d='M23,20 Q35,33 23,46' stroke='%23206455' stroke-width='6' stroke-linecap='round' fill='none'/%3E%3Cpath d='M55,84 C80,80 86,58 74,40 C64,55 56,60 52,73 Z' fill='%23b8935a'/%3E%3Ctext x='52' y='68' text-anchor='middle' font-family='Georgia, serif' font-weight='700' font-size='46' fill='%230b1a1c'%3EN%3C/text%3E%3C/svg%3E">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-sand-50 font-sans text-ink-900">

    <div class="scroll-progress" data-scroll-progress></div>
    <div class="grain-overlay"></div>

    @include('partials.header')

    <main class="flex-1">
        {{ $slot }}
    </main>

    @include('partials.footer')

</body>
</html>
