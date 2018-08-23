<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use R64\LaravelEmailMarketing\MarketingTools\MarketingToolManager;

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

Route::get('/lists', function (Request $request) {
    $marketingToolManager = new MarketingToolManager;
    return $marketingToolManager->getLists();
});

Route::get('/lists/{listId}', function (Request $request, $listId) {
    $marketingToolManager = new MarketingToolManager;
    return $marketingToolManager->getList($listId);
});