<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use R64\LaravelEmailMarketing\MarketingTools\MarketingToolManager;
use R64\NovaEmailMarketingTool\NovaToolData\NovaToolData;
/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::get('/tool', function (Request $request) {
    return NovaToolData::toolData();
});

Route::get('/lists', function (Request $request) {
    $marketingToolManager = new MarketingToolManager;
    return $marketingToolManager->getLists();
});

Route::get('/lists/{listId}', function (Request $request, $listId) {
    $marketingToolManager = new MarketingToolManager;
    return $marketingToolManager->getList($listId);
});

Route::get('/list-subscribers/{listId}', function (Request $request, $listId) {
    $marketingToolManager = new MarketingToolManager;
    return $marketingToolManager->getListSubscribers($listId);
});

Route::get('/subscribers', function (Request $request) {
    $marketingToolManager = new MarketingToolManager;
    return $marketingToolManager->getSubscribers();
});

Route::get('/subscribers/{subscriberId}', function (Request $request, $subscriberId) {
});


