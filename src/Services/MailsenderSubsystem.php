<?php namespace professionalweb\IntegrationHub\Mailsender\Services;

use professionalweb\IntegrationHub\Mailsender\Models\MailsenderOptions;
use professionalweb\IntegrationHub\Mailsender\Interfaces\MailsenderService;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\EventData;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Services\Subsystem;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\ProcessOptions;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\SubsystemOptions;
use professionalweb\IntegrationHub\Mailsender\Interfaces\MailsenderSubsystem as IMailsenderSubsystem;

/**
 * Subsystem to send mails
 * @package professionalweb\IntegrationHub\Mailsender\Services
 */
class MailsenderSubsystem implements IMailsenderSubsystem
{
    /**
     * @var ProcessOptions
     */
    private $processOptions;

    /**
     * @var MailsenderService
     */
    private $mailSenderService;

    public function __construct(MailsenderService $mailSenderService)
    {
        $this->setMailSenderService($mailSenderService);
    }

    /**
     * Set options with values
     *
     * @param ProcessOptions $options
     *
     * @return Subsystem
     */
    public function setProcessOptions(ProcessOptions $options): Subsystem
    {
        $this->processOptions = $options;

        return $this;
    }

    /**
     * Get available options
     *
     * @return SubsystemOptions
     */
    public function getAvailableOptions(): SubsystemOptions
    {
        return new MailsenderOptions();
    }

    /**
     * Process event data
     *
     * @param EventData $eventData
     *
     * @return EventData
     */
    public function process(EventData $eventData): EventData
    {
        $data = $eventData->getData();
        $options = $this->getAvailableOptions()->getOptions();

        $this->getMailSenderService()->send(
            $data['email'], $options['subject'], $options['body'], $data
        );

        return $eventData;
    }

    /**
     * @return MailsenderService
     */
    public function getMailSenderService(): MailsenderService
    {
        return $this->mailSenderService;
    }

    /**
     * @param MailsenderService $mailSenderService
     *
     * @return $this
     */
    public function setMailSenderService(MailsenderService $mailSenderService): self
    {
        $this->mailSenderService = $mailSenderService;

        return $this;
    }

    /**
     * @return ProcessOptions
     */
    public function getProcessOptions(): ProcessOptions
    {
        return $this->processOptions;
    }
}