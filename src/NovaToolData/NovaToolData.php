<?php

namespace R64\NovaEmailMarketingTool\NovaToolData;

class NovaToolData {
    const TOOL_DATA = [
        'activecampaign' => [
            'title' => 'ActiveCampaign',

            'pages' => [
                'lists' => 'Lists',
                'list' => 'List',
                'subscribers' => 'Contacts',
                'subscriber' => 'Contact'
            ],
            'sidebar' => [
                'Lists' => 'nova-email-marketing-tool-lists',
                'Contacts' => 'nova-email-marketing-tool-subscribers'
            ]
        ],
        'getresponse' => [
            'title' => 'GetResponse',
            'pages' => [
                'lists' => 'Campaigns',
                'list' => 'Campaign',
                'subscribers' => 'Contacts',
                'subscriber' => 'Contact'
            ],
            'sidebar' => [
                'Campaigns' => 'nova-email-marketing-tool-lists',
                'Contacts' => 'nova-email-marketing-tool-subscribers'
            ]
        ],
        'mailchimp' => [
            'title' => 'MailChimp',

            'pages' => [
                'lists' => 'Lists',
                'list' => 'List',
                'subscribers' => 'Subscriber'
            ],
            'sidebar' => [
                'Lists' => 'nova-email-marketing-tool-lists'
            ],
        ]
    ];

    static function toolData() {
        return isset(self::TOOL_DATA[config('email-marketing.tool')]) ?
            self::TOOL_DATA[config('email-marketing.tool')] :
            null;
    }
}