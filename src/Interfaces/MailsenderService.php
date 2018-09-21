<?php namespace professionalweb\IntegrationHub\Mailsender\Interfaces;

/**
 * Interface for mail sender
 * @package professionalweb\IntegrationHub\Mailsender\Interfaces
 */
interface MailsenderService
{
    /**
     * Send mail
     *
     * @param string $email
     * @param string $subject
     * @param string $body
     * @param array  $data
     *
     * @return MailsenderService
     */
    public function send(string $email, string $subject, string $body, array $data): self;
}