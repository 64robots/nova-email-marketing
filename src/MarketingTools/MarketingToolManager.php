<?php

namespace R64\NovaEmailMarketing\MarketingTools;

use R64\NovaEmailMarketing\Contracts\MarketingTool as MarketingToolContract;
use R64\NovaEmailMarketing\MarketingTools\BaseMarketingTool;
use \DrewM\MailChimp\MailChimp;
use Exception;

class MarketingToolManager extends BaseMarketingTool implements MarketingToolContract
{
    const TOOL_CLASSES = [
        'mailchimp' => \R64\NovaEmailMarketing\MarketingTools\MailchimpMarketingTool::class
    ];
    
    private $marketingTool;

    private $connected;

    /**
     * 
     */
    function __construct() {
        if (!$this->marketingToolExists()) {
            throw new Exception('Marketing tool not found in config');
        }
        $toolClass = self::TOOL_CLASSES[config('email-marketing.tool')];
        $this->marketingTool = new $toolClass;
    
        $this->connected = $this->marketingTool->isConnected();
    }

    /**
     *
     */
    public function getLists() {
        return $this->marketingTool->getLists();
    }

    /**
     * 
     *
     * @param  string  $listId
     */
    public function getList($listId) {
        return $this->marketingTool->getList($listId);
    }

    public function isConnected() {
        return $this->connected;
    }
}
