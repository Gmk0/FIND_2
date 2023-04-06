<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class isOnlineUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $users_to_offline = User::where('last_activity', '<', now());
        $users_to_online = User::where('last_activity', '>=', now());
        if (isset($users_to_offline)) {
            $users_to_offline->update(['is_online' => false]);
        }if (isset($users_to_online)) {
            $users_to_online->update(['is_online' => true]);
        }
        if (auth()->check()) {
            $cache_value = Cache::put('user-is-online', auth()->id(), \Carbon\Carbon::now()->addMinutes(1));
            $user = User::find(Cache::get('user-is-online'));
            $user->last_activity = now()->addMinutes(1);
            $user->is_online = true;
            $user->save();
        } elseif(!auth()->check() and filled(Cache::get('user-is-online'))) {
            $user = User::find(Cache::get('user-is-online'));
            if (isset($user)) {
                $user->is_online = false;
                $user->save();
            }
        }
        return $next($request);
    }
}
