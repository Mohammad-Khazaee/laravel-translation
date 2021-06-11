<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class ticketForUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $tickets = User::findOrFail(auth()->id())->tickets->toArray();
        $tickets_id = array_column($tickets, 'id');
        if (!in_array($request->route()->parameters()['ticket'] ,$tickets_id)) {
            abort(404);
        }
        return $next($request);
    }
}
