<?php

namespace App\Http\Middleware;

use App\Models\StoresCategory;
use Closure;

class StoreCategory
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
        $store_category = StoresCategory::where('slug', $request->store_category)->first();
        if($store_category){
            \Session::put('store_category', $request->store_category);
            \View::share('store_category', $request->store_category);
        }
        return $next($request);
    }
}
