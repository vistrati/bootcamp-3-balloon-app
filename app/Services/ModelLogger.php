<?php

namespace App\Services;

use App\Models\LoggableInterface;
use App\Models\User;
use Psr\Log\LoggerInterface;

class ModelLogger
{
    use UserRepresentationTrait;

    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function logModel(?User $user, LoggableInterface $loggable): void
    {
        $this->logger->info(
            $this->identifyUserRepresentation($user) . ' accessed ' . $loggable->convertToLoggableString(),
            $loggable->getData(),
        );
    }
}
