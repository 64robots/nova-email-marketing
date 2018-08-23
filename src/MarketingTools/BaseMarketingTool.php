<?php

namespace R64\NovaEmailMarketing\MarketingTools;

abstract class BaseMarketingTool
{   
    protected function marketingToolExists() {
        return isset(config('email-marketing.tools')[config('email-marketing.tool')]);
    }

    protected function marketingTool() {
        return config('email-marketing.tools')[config('email-marketing.tool')];
    }

}
