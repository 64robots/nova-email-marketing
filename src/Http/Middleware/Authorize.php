<?php

namespace R64\NovaEmailMarketing\Http\Middleware;

use R64\NovaEmailMarketing\NovaEmailMarketingTool;

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
