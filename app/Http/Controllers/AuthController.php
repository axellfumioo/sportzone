<?php

namespace App\Http\Controllers;

use App\Models\OrderHistory;
use App\Models\ticket as ModelsTicket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\Attributes\Ticket;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $token = Auth::login($user);
        return redirect("/profile");
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials',
            ], 401);
        }

        $user = Auth::user();
        $token = Auth::login($user);
        return redirect("/profile");
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }

    public function profile()
    {
        $user = Auth::user();
        if (!Auth::check()) {
            return redirect('/');
        } else {
            $orders = OrderHistory::where('email', $user->email)->get();
            $ticket = ModelsTicket::where('user_id', $user->id)->get();
            return view('profile.index', compact('user', 'orders', 'ticket'));
        }
    }
}
