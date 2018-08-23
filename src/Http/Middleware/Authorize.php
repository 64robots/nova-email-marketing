<?php

namespace R64\NovaEmailMarketingTool\Http\Middleware;

use R64\NovaEmailMarketingTool\NovaEmailMarketingTool;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(NovaEmailMarketingTool::class)->authorize($request) ? $next($request) : abort(403);
    }
}
