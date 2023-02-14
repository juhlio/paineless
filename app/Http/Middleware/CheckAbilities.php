<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAbilities
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $abilities
     * @return mixed
     */
    public function handle($request, Closure $next, $abilities)
    {
        $abilities = explode(',', $abilities);

        foreach ($abilities as $ability) {
            if ($request->user()->can($ability)) {
                return $next($request);
            }
        }

        // Redirecione ou retorne a resposta adequada aqui
    }
}