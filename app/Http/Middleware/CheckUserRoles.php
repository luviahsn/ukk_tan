<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // buat akses data user yang login
use Symfony\Component\HttpFoundation\Response;

class CheckUserRoles
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var \App\Models\User $user */
        $user = Auth::user(); // ambil user yang sedang login

        // kalau user belum login ATAU role-nya bukan super_admin atau siswa
        if (!Auth::check() || !$user->hasAnyRole(['super_admin', 'siswa'])) {
            // abort(403, 'Anda belum punya akses. Silakan hubungi admin :)');

            return redirect()->route('tungguAdmin'); //ini muncul ke tampilan yg ada di tunggu.blade.php
        }

        return $next($request); // kalau lolos, lanjut ke proses berikutnya
    }
}
