<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
//use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;


class authJWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)

    {

        try {
           //$user = JWTAuth::toUser($request->header('Authorization'));
           $user =  JWTAuth::parseToken()->authenticate();
            //$user = $request->header('Authorization');
        } catch (Exception $e) {
            //dd($e);
            if ($e instanceof TokenInvalidException){
                return response()->json(['error'=>'Token is Invalid'],400);
            }else if ($e instanceof TokenExpiredException){
                return response()->json(['error'=>'Token is Expired'],400);
            }else if ($e instanceof JWTException){
                return response()->json(['error' => 'Token is required'], 400);
            }else{
                return response()->json(['error'=>$e->getMessage()]);
            }
        }
        return $next($request);

    }

}

