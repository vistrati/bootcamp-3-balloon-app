<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Mail\Message;

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

        \Mail::send(
            'emails.contactUs',
            [
                'email' => $data['email'],
                'name' => $data['name'],
                'districts' => $data['districts'],
                'department' => $data['department'],
                'messageText' => $data['message'],
            ],
            function (Message $message) use ($data) {
                $message->subject('message from ' . $data['email']);
                $message->to('tech@baloon.app');
                $message->from('no-reply@baloon.app', 'Baloon mailer');
            }
        );

        return redirect()->route('contactUs')->withInput($data);
    }
}
