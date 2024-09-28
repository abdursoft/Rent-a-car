<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth\JWTAuth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authToken = $request->cookie('admin_token');
        $token = JWTAuth::verifyToken($authToken,false);
        if($token && $token->role === 'admin'){
            $request->headers->set('email',$token->email);
            $request->headers->set('id',$token->id);
            return $next($request);
        }else{
            return redirect('/admin/login')->with('error',"Unauthenticated access");
        }
    }
}
