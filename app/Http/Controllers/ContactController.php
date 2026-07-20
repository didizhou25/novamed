<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactSubmissionRequest;
use App\Mail\ContactFormSubmitted;
use App\Models\ContactSubmission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function create(): View
    {
        $validTypes = ['algemeen', 'donateur', 'vrijwilliger', 'partner'];
        $type = request()->query('type');

        return view('pages.contact', [
            'title' => 'Contact',
            'description' => 'Neem contact op met NovaMed Research Foundation voor onderzoek, donaties of samenwerking.',
            'selectedType' => in_array($type, $validTypes, true) ? $type : 'algemeen',
        ]);
    }

    public function store(StoreContactSubmissionRequest $request): RedirectResponse|JsonResponse
    {
        $submission = ContactSubmission::create($request->validated());

        $notifyAddress = config('mail.from.address');

        if ($notifyAddress) {
            Mail::to($notifyAddress)->send(new ContactFormSubmitted($submission));
        }

        $message = 'Bedankt voor uw bericht. Wij nemen zo spoedig mogelijk contact met u op.';

        if ($request->wantsJson()) {
            return response()->json(['status' => 'ok', 'message' => $message]);
        }

        return redirect()->route('contact')->with('status', $message);
    }
}
