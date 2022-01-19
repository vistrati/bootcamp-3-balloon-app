<?php

namespace App\Services;

use Illuminate\Http\Request;

interface RequestActivityLoggerInterface
{
    public function logRequest(Request $request, string $type): void;
}
