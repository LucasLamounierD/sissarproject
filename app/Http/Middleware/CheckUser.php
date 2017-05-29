<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\User;
use Closure;

class CheckUser
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
        if(Auth::check()){
           $user = Auth::user();
           if($user["user_perfil"]=='Administrador'){
               return redirect("funcionario/list");
           }else if($user['user_perfil']=='Atendente'){
               return redirect("candidato/list");
           }else if($user['user_perfil']=='Candidato'){
               return redirect("candidato/list");
           }
        }
        return $next($request);
    }
}
