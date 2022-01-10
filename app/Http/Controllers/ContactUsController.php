<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ContactUsController extends Controller
{
    public function view(): View
    {
        return view('contacts.contactUs');
    }

    public function send(ContactUsRequest $request): RedirectResponse
    {
        $data = $request->validated();
        \Log::debug('test', $data);

        return redirect()->route('contactUs')->withInput($data);
    }
}
