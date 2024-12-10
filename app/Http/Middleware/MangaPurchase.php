<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MangaPurchase
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $chapter = $request->route('id') ? \App\Models\Chapter::find($request->route('id')) : null;

        if (!$chapter) {
            abort(404, 'Chapter not found.');
        }

        $manga = $chapter->manga;
        $user = Auth::user();

        // Jika user memiliki role staff atau admin, lewati pemeriksaan
        if (in_array($user->role, ['staff', 'admin'])) {
            return $next($request);
        }

        // Jika manga berbayar, cek apakah user sudah membelinya
        if ($manga->is_paid) {
            $hasPurchased = \App\Models\MangaPurchase::where('user_id', $user->id)
                ->where('manga_id', $manga->id)
                ->exists();

            if (!$hasPurchased) {
                return redirect()->route('manga', $manga->id)
                    ->with('error', 'You need to unlock this manga to read its chapters.');
            }
        }

        return $next($request);
    }
}
