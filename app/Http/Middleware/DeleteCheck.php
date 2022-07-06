<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class DeleteCheck
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
        if(!Session()->has('loginId')){
            return redirect('login')->with('fail','You have to login to edit your details');
        }

        if(Session()->has('loginId')){
            $data = User::where('id','=',Session()->get('loginId'))->first();
            if($data->role!="Admin"){
                return back();
            }
            return $next($request);
        }
        return $next($request);
    }
}
