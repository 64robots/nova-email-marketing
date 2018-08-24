<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/tool', R64\NovaEmailMarketingTool\Http\Controllers\ToolController::class . '@index')
    ->name('tool.list');

Route::get('/lists', R64\NovaEmailMarketingTool\Http\Controllers\ListsController::class . '@index')
    ->name('lists.list');

Route::get('/lists/{listId}', R64\NovaEmailMarketingTool\Http\Controllers\ListsController::class . '@show')
    ->name('lists.get');

Route::get('/list-subscribers/{listId}', R64\NovaEmailMarketingTool\Http\Controllers\ListSubscribersController::class . '@show')
    ->name('list-subscribers.get');

Route::get('/subscribers', R64\NovaEmailMarketingTool\Http\Controllers\SubscribersController::class . '@index')
    ->name('subscribers.list');

Route::get('/subscribers/{subscriberId}', R64\NovaEmailMarketingTool\Http\Controllers\SubscribersController::class . '@show')
    ->name('subscribers.get');


