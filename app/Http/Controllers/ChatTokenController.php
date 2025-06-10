<?php

namespace App\Http\Controllers;

use App\Models\chatToken;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;

class ChatTokenController extends Controller
{
    public function getToken(Request $request)
    {
        $start = microtime(true);

        $agent = new Agent();

        if ($agent->isRobot()) {
            return $this->jsonResponse('Access denied', 403, $start, []);
        }

        $token = (string) Str::uuid();

        chatToken::create([
            'token' => $token,
            'messages' => 'No history',
            'return' => 'No history'
        ]);

        return $this->jsonResponse(null, 200, $start, ['token' => $token]);
    }

    private function jsonResponse(?string $error, int $status, float $start, array $data = []): \Illuminate\Http\JsonResponse
    {
        $executionTime = (microtime(true) - $start) * 1000;
        $response = [
            'execution_time_ms' => round($executionTime, 2),
        ];

        if ($error) {
            $response['error'] = $error;
        }

        return response()->json(array_merge($response, $data), $status);
    }
}
