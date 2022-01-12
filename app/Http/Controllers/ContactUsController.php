<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Services\ContactUsMailer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ContactUsController extends Controller
{
    public function view(): View
    {
        return view('contacts.contactUs');
    }

    public function send(ContactUsRequest $request, ContactUsMailer $mailer): RedirectResponse
    {

        $data = $request->validated();
        \Log::debug('test', $data);

        $mailer->send($data);

        return redirect()->route('contactUs')->withInput($data);
    }
}
