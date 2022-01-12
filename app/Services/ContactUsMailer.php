<?php

namespace App\Services;

use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Psr\Log\LoggerInterface;

class ContactUsMailer
{
    private Mailer $infrastructureMailer;
    private LoggerInterface $logger;

    public function __construct(Mailer $infrastructureMailer, LoggerInterface $logger)
    {
        $this->infrastructureMailer = $infrastructureMailer;
        $this->logger = $logger;
    }

    public function send(array $data): void
    {
        $this->infrastructureMailer->send(
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
        $this->logger->info('Contact Us mail send to tech@baloon.app');
    }
}
