<?php

namespace App\Http\Middleware;

use Closure;
use App\Utils;

class UserAuth
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
        $authorization = $request->header('Authorization');
        if ($authorization) {
            if (Utils::isValidJWT($authorization)) {
                return $next($request);
            } else {
                return Utils::responseMessage("authorization failed", 'authentication', 403);
            }
        } else {
            return Utils::responseMessage("please provide valid token", 'authentication', 403);
        }

    }
}
