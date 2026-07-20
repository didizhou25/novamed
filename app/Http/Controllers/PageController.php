<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'title' => null,
            'description' => 'NovaMed Research Foundation voert onafhankelijk onderzoek uit naar regeneratieve geneeskunde, biofysische technologieën en gepersonaliseerde gezondheidszorg.',
        ]);
    }

    public function overOns(): View
    {
        return view('pages.over-ons', [
            'title' => 'Over ons',
            'description' => 'De missie, visie en kernwaarden van NovaMed Research Foundation.',
        ]);
    }

    public function onderzoek(): View
    {
        return view('pages.onderzoek', [
            'title' => 'Onderzoek',
            'description' => 'Onze onderzoeksprogramma\'s, onderzoeksgebieden en onderzoeksopzet.',
        ]);
    }

    public function toekomst(): View
    {
        return view('pages.toekomst', [
            'title' => 'Toekomst',
            'description' => 'De ambities van NovaMed Research Foundation voor de komende tien jaar.',
        ]);
    }
}
