<?php

namespace App\Http\Middleware;

use App\Helper\Helper;
use Closure;
use Illuminate\Http\Request;
use DB;

class Gorlabs
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!checkDbConnection() && !$request->is('install')) {
            clearAllLogs();
            return redirect()->route('install.index');
        }
        if (checkDBConnection()) {
            DB::connection()->disableQueryLog();
            Helper::getRoles('system');

        }

        return $next($request);
    }
}
