<?php namespace professionalweb\IntegrationHub\Mailsender\Services;

use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use professionalweb\IntegrationHub\Mailsender\Interfaces\MailsenderService as IMailsenderService;

/**
 * Service to send mails
 * @package professionalweb\IntegrationHub\Mailsender\Services
 */
class MailsenderService implements IMailsenderService
{

    /**
     * Send mail
     *
     * @param string $email
     * @param string $subject
     * @param string $body
     * @param array  $data
     *
     * @return IMailsenderService
     */
    public function send(string $email, string $subject, string $body, array $data): IMailsenderService
    {
        foreach ($data as $key => $val) {
            $body = str_replace('{{' . $key . '}}', $val, $body);
        }

        Mail::send((new Mailable())->to($email)->html($body)->subject($subject));

        return $this;
    }
}