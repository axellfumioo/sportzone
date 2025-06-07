<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Jenssegers\Agent\Agent;

class ChatTokenController extends Controller
{
    private const CACHE_PREFIX = 'chat_token_';
    private const CACHE_DURATION = 2; // hours

    public function getToken(Request $request)
    {
        // Check for robots early
        if ((new \Jenssegers\Agent\Agent())->isRobot()) {
            return response()->json(['error' => 'Access denied'], 403);
        }

        $token = $request->cookie('chat_token');

        // If no token, generate and store a new one
        if (!$token) {
            $token = Str::uuid();
            $cacheKey = self::CACHE_PREFIX . $token;
            Cache::put($cacheKey, true, now()->addHours(self::CACHE_DURATION));

            return response()
                ->json(['token' => $token])
                ->cookie('chat_token', $token, 0); // session cookie
        }

        // Extend cache if token exists and is not cached
        $cacheKey = self::CACHE_PREFIX . $token;
        Cache::add($cacheKey, true, now()->addHours(self::CACHE_DURATION));

        return response()->json(['token' => $token]);
    }
}
