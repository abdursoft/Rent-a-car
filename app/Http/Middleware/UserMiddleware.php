<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth\JWTAuth;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $authToken = $request->cookie('customer_token');
        $token = JWTAuth::verifyToken($authToken,false);

        $customer = User::isCustomer(User::find($token->id));

        if($token && $customer){
            $request->headers->set('email',$token->email);
            $request->headers->set('id',$token->id);
            return $next($request);
        }else{
            return redirect('/login')->with('error',"Unauthenticated access");
        }
    }
}
