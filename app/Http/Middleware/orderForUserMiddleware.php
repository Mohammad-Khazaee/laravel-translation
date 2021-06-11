<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class orderForUserMiddleware
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
        $orders = User::findOrFail(auth()->id())->order->toArray();
        $orders_id = array_column($orders , 'id');
        if (!in_array($request->route()->parameters()['order'] ,$orders_id)) {
            abort(404);
        }

        return $next($request);
    }
}
