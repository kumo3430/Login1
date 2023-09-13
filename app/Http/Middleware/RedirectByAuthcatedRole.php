<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectByAuthcatedRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //建立一個路由和角色的對應陣列
        $authUri = ['user' => '/userhome', 'merchant' => '/home'];

        //判斷使用者是否是此路由的合法使用者
        if ($request->getRequestUri() != $authUri[Auth::user()->role]) {
            switch (Auth::user()->role) {
                case 'user':
                    return redirect(RouteServiceProvider::USERHOME);
                    break;
                case 'merchant':
                    return redirect(RouteServiceProvider::HOME);
                    break;
            }
        }
        return $next($request);
    }
}