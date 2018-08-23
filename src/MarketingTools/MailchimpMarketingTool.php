<?php

namespace R64\NovaEmailMarketing\MarketingTools;

use League\Fractal;
use R64\NovaEmailMarketing\Contracts\MarketingTool as MarketingToolContract;
use R64\NovaEmailMarketing\MarketingTools\BaseMarketingTool;
use R64\NovaEmailMarketing\Transformers\MailchimpListTransformer;

class MailchimpMarketingTool extends BaseMarketingTool implements MarketingToolContract
{   
    private $mailchimpApi;

    private $connected; 

    /**
     * 
     */
    function __construct() {
        parent::__construct();

        $apiKey = $this->credentials();
        if (!$apiKey) {
            throw new Exception('MailChimp credentials not found in config');
        }
        $this->mailchimpApi = new \DrewM\MailChimp\MailChimp($apiKey);
        $this->connected = $this->ping();
    }

    /**
     *
     */
    public function getLists() {
        $lists = $this->mailchimpApi->get('lists');
        if (!$lists) {
            return false;
        }

        return $this->fractal->createData(new Fractal\Resource\Collection($lists['lists'], new MailchimpListTransformer))->toArray();
    }

    /**
     * 
     *
     * @param  string  $listId
     */
    public function getList($listId) {
        $list = $this->mailchimpApi->get('lists/' . $listId);
        if (!$list) {
            return false;
        }

        return $this->fractal->createData(new Fractal\Resource\Item($list, new MailchimpListTransformer))->toArray();
    }

    public function createList() {

    }

    public function isConnected() {
        return $this->connected;
    }
    
    private function ping() {
        return $this->mailchimpApi->get('ping') ? true : false;
    }

    private function credentials()
    {
        if ($this->marketingToolExists()) {
            return $this->marketingTool()['api_key'];
        }
    }
}
