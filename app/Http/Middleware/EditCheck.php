<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class EditCheck
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
            //    dd($user);
            // $value = $request->session()->get('id');
            $data = User::where('id','=',Session()->get('loginId'))->first();
            // echo($data);

            $tempId = substr($request->url(),32);
            // echo ($tempId);
            $userId = strval($data->id);
            if($tempId!=$userId and $data->role!="Admin"){
                return back();
            }
        }
        return $next($request);
    }
}