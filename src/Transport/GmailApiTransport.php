<?php

namespace OralUnal\GmailApi\Transport;

use Google\Service\Gmail;
use Google\Service\Gmail\Message;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;

class GmailApiTransport extends AbstractTransport
{
    /**
     * Create a new Gmail transport instance.
     */
    public function __construct(
        protected Gmail $gmail
    ) {
        parent::__construct();
    }

    /**
     * {@inheritDoc}
     */
    protected function doSend(SentMessage $message): void
    {
        // Create Gmail message
        $gmailMessage = new Message();
        $gmailMessage->setRaw(rtrim(strtr(base64_encode($message->toString()), '+/', '-_'), '='));

        // Send the message
        $this->gmail->users_messages->send('me', $gmailMessage);
    }

    /**
     * String representation of the transport
     */
    public function __toString(): string
    {
        return 'gmail-api';
    }
}
