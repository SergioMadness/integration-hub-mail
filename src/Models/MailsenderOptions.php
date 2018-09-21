<?php namespace professionalweb\IntegrationHub\Mailsender\Models;

use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\SubsystemOptions;

/**
 * Subsystem options
 * @package professionalweb\IntegrationHub\Mailsender\Models
 */
class MailsenderOptions implements SubsystemOptions
{


    /**
     * Get available fields for mapping
     *
     * @return array
     */
    public function getAvailableFields(): array
    {
        return [
            'email',
        ];
    }

    /**
     * Get service settings
     *
     * @return array
     */
    public function getOptions(): array
    {
        return [
            'subject' => [
                'name' => 'Тема письма',
                'type' => 'string',
            ],
            'body'    => [
                'name' => 'Тело письма',
                'type' => 'text',
            ],
        ];
    }
}