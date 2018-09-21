<?php namespace professionalweb\IntegrationHub\Mailsender\Providers;

use professionalweb\IntegrationHub\Mailsender\Listeners\NewEventListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Events\EventToProcess;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        EventToProcess::class => [
            NewEventListener::class,
        ],
    ];
}
