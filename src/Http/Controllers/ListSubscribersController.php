<?php

namespace R64\NovaEmailMarketingTool\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use R64\LaravelEmailMarketing\MarketingTools\MarketingToolManager;

class ListSubscribersController extends Controller
{
    public $marketingToolManager;

    function __construct(MarketingToolManager $manager)
    {
        $this->marketingToolManager = $manager;    
    }

    public function show($listId)
    {
        return $this->marketingToolManager->getListSubscribers($listId);
    }
}