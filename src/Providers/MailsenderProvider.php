<?php namespace professionalweb\IntegrationHub\Mailsender\Providers;

use Illuminate\Support\ServiceProvider;
use professionalweb\IntegrationHub\Mailsender\Services\MailsenderService;
use professionalweb\IntegrationHub\Mailsender\Services\MailsenderSubsystem;
use professionalweb\IntegrationHub\Mailsender\Interfaces\MailsenderService as IMailsenderService;
use professionalweb\IntegrationHub\Mailsender\Interfaces\MailsenderSubsystem as IMailsenderSubsystem;

class MailsenderProvider extends ServiceProvider
{
    public function boot(): void
    {

    }

    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);

        $this->app->bind(IMailsenderService::class, MailsenderService::class);
        $this->app->bind(IMailsenderSubsystem::class, MailsenderSubsystem::class);
    }
}