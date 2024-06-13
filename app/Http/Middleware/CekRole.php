<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect('/login')->with([
                'notifikasi' => 'Silakan login terlebih dahulu!',
                'type' => 'warning'
            ]);
        }

        $user = Auth::user();

        if ($user->role !== $role) {
            return redirect('/login')->with([
                'notifikasi' => 'Anda tidak memiliki akses!',
                'type' => 'warning'
            ]);
        }

        return $next($request);
    }
}
