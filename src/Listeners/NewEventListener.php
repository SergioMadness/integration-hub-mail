<?php namespace professionalweb\IntegrationHub\Mailsender\Listeners;

use professionalweb\IntegrationHub\Mailsender\Interfaces\MailsenderSubsystem;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Events\EventToProcess;

class NewEventListener
{
    /**
     * @var MailsenderSubsystem
     */
    private $mailsenderSubsystem;

    public function __construct(MailsenderSubsystem $subsystem)
    {
        $this->setMailsenderSubsystem($subsystem);
    }

    public function handle(EventToProcess $eventToProcess)
    {
        return $eventToProcess->getProcessOptions()->getSubsystemId() === MailsenderSubsystem::SUBSYSTEM_ID ?
            $this->getMailsenderSubsystem()
                ->setProcessOptions($eventToProcess->getProcessOptions())
                ->process($eventToProcess->getEventData()) :
            $eventToProcess->getEventData();
    }

    /**
     * @return MailsenderSubsystem
     */
    public function getMailsenderSubsystem(): MailsenderSubsystem
    {
        return $this->mailsenderSubsystem;
    }

    /**
     * @param MailsenderSubsystem $mailsenderSubsystem
     *
     * @return $this
     */
    public function setMailsenderSubsystem(MailsenderSubsystem $mailsenderSubsystem): self
    {
        $this->mailsenderSubsystem = $mailsenderSubsystem;

        return $this;
    }
}