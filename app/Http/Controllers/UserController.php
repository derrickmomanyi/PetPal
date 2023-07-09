<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }

  
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|confirmed|string',
            
        ]);

        $user = new User;
        $user = User::create($request->all());  
        $user->save();

        if ($request->expectsJson()) {
            $response = [
                'result_code' => 0,
                'message' => "User Created",
                'data' => $user
            ];
        
            return response()->json($response);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|string',
        'password' => 'required|string'
    ]);

      // Check email
      $user = User::where('email', $credentials['email'])->first();

       // Check password
       if(!$user || !Hash::check($credentials['password'], $user->password)) {
        return response([
            'message' => 'Bad credentials'
        ], 401);
      }
    
      $token = $user->createToken('myapptoken')->plainTextToken;

      $response = [
          'user' => $user,
          'token' => $token
      ];

      return response($response, 201);

    
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
    
        return [
            'message' => 'Logged out'
        ];
    }
   
}
