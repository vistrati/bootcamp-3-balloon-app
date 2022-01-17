<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

class LogActivityMiddleware
{
    private LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @param string|null $type
     */
    public function handle($request, Closure $next, ?string $type = null)
    {
        /** @var User $user */
        $user = $request->getUser();
        $userRepresentation = $user ? "User with id {$user->id}" : 'Unknown User';

        $this->logger->debug(
            $userRepresentation . ' made a request to ' . ($type ?? 'unknown page'),
            ['data placeholder']
        );

        return $next($request);
    }
}
