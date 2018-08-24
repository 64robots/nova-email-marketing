<?php

namespace R64\NovaEmailMarketingTool\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use R64\NovaEmailMarketingTool\NovaToolData\NovaToolData;

class ToolController extends Controller
{
    public function index()
    {
        return NovaToolData::toolData();
    }
}