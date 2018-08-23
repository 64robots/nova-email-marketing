<?php

namespace R64\NovaEmailMarketing\MarketingTools;

use League\Fractal\Manager;

abstract class BaseMarketingTool
{   
    protected $fractal;
    
    function __construct() {
        $this->fractal = new Manager;
    }

    protected function marketingToolExists() {
        return isset(config('email-marketing.tools')[config('email-marketing.tool')]);
    }

    protected function marketingTool() {
        return config('email-marketing.tools')[config('email-marketing.tool')];
    }

}
