<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Log;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $method = $request->method();
        if(($method == "GET" && env("APP_DEBUG")) || $method == "POST"){
            $ip = $request->ip();
            $uri = $request->path();
            $log = new Log;
            $log->info = json_encode([
                "metodo" => $method,
                "ip" => $ip,
                "uri" => $uri
            ]);

            $log->save();
        }
        

        return $next($request);
    }
}
