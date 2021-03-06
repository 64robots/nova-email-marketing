<?php

namespace R64\NovaEmailMarketingTool;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;
use R64\NovaEmailMarketingTool\NovaToolData\NovaToolData;

class NovaEmailMarketingTool extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('nova-email-marketing-tool', __DIR__.'/../dist/js/tool.js');
        Nova::style('nova-email-marketing-tool', __DIR__.'/../dist/css/tool.css');
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('nova-email-marketing-tool::navigation', [
            'tool' => NovaToolData::toolData()
        ]);
    }
}
