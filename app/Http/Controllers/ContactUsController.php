<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ContactUsController extends Controller
{
    public function view(): View
    {
        return view('contacts.contactUs');
    }
}
