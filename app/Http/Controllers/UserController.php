<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Controllers\api\ResponseController;

class UserController extends ResponseController {

    public function register( UserRegisterRequest $request ) {

        $request->validated();

        $user = User::create([

            "name" => $request["name"],
            "email" => $request["email"],
            "password" => bcrypt( $request["password"])
        ]);

        return $this->sendResponse( $user->name, "Sikeres regisztráció");
    }

    public function login( UserLoginRequest $request ) {

        $request->validated();

        $credentials = $request->only( "email", "password" );

        if( !Auth::attempt( $credentials ) ) {

            return $this->sendError( "Hiba", "Hiba a bejelentkezésben");
        }

        $user = $request->user();

        $user->tokens()->delete();

        $token = $user->createToken( "auth_token" )->plainTextToken;

        return $this->sendResponse( $token, "Sikeres bejelentkezés");
    }
    public function logout() {

        auth( "sanctum" )->user()->currentAccessToken()->delete();
        $name = auth( "sanctum" )->user()->name;

        return $this->sendResponse( $name, "Sikeres kijelentkezés");
    }

    public function getUsers() {

        $users = User::all();

        return $users;
    }

    public function getTokens() {

        $tokens = DB::table( "personal_access_tokens" )->get();

        return $tokens;
    }
}
