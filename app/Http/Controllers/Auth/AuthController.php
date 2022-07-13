<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Validator;
use Exception;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

// models
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        $login = $req->validate([
            'email' => 'bail|required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $req->email)->first();

        if ($user->email_verified_at === null) {
            $user->email_verified_at = Carbon::now();
            $user->save();
        }

        if (!Auth::attempt($login)) {
            return Redirect('login');
            return response([
                'status' => 401,
                'message' => 'Username and password do not match.',
            ], Response::HTTP_UNAUTHORIZED);
        } else {
            return redirect('home');
        }

        return response([
            'user' => [
                'status' => 200,
                'data' => $user,
            ],
            'status' => 200,
        ], Response::HTTP_OK);
    }

    public function checkLogin()
    {
        return response()->json([
            'valid' => auth()->check(),
        ]);
    }

    public function home()
    {
        return view('home\index');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/loginView');
    }
}
