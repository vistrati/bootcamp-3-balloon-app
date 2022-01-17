<?php

namespace App\Services;

use Illuminate\Http\Request;

class DummyRequestActivityLogger extends AbstractRequestActivityLogger
{
    protected function collectRequestData(Request $request): array
    {
        return ['dummy data'];
    }
}
