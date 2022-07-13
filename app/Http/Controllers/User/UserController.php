<?php

namespace App\Http\Controllers\User;

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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $this->validate($req, [
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'first_name' => 'required',
        ]);

        // create user
        $user = new User;
        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->birthday = $req->birthday;
        $user->gender = $req->gender;
        $user->save();

        return redirect("/loginView")->withSuccess('Great! You have Successfully loggedin');

        return response([
            'user' => [
                'data' => $user
            ],
        ], Response::HTTP_OK);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function update(Request $req, $userId)
    {
        $user = User::find($userId);
        if ($user === null) {
            return response()->json([
                'status' => 404,
                'message' => 'User could not be found',
            ], Response::HTTP_NOT_FOUND);
        }

        $user->first_name = $req->firstname;
        $user->last_name = $req->lastname;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->birthday = $req->birthday;
        $user->gender = $req->gender;
        $user->save();

        return response([
            'data' => $user,
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user === null) {
            return response()->json([
                'success' => false,
                'message' => 'User could not be found',
            ], Response::HTTP_NOT_FOUND);
        } else {
            if ($user->delete()) {
                return response()->json([
                    'success' => true,
                ], Response::HTTP_OK);
            }
        }
    }
}
