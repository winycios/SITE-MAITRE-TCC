<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;


class VerifyUserAgent
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
        $agent = new Agent();
       // $agent = $request->header('user-agent');

        if($agent->isMobile()){
            //return response()->json("mobile");
            return response()->view('app');

        }elseif($agent->isTablet()){
            //return response()->json("tablet");
            return response()->view('app');
        }else{
            //return response()->json("PC");
            return $next($request);
        }
        

    }
}
