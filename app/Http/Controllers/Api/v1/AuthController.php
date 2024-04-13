<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\LoginEmployeeRequest;
use App\Http\Requests\RegisterEmployeeRequest;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends BaseApiController
{
    public function login(LoginEmployeeRequest $request)
    {
        $credentials = $request->validated();

        if (!$token = JWTAuth::attempt($credentials)) {
            return $this->sendError(error: 'Unauthorized', code: 401);
        }
        $user = User::where('email', $request->email)->first();

        $role = $user ? $user->role : null;
        $name = $user ? $user->name : null;

        return $this->respondWithToken($token, $name, $role);
    }
    // #[Route('api/v1/register')]
    // public function register(RegisterEmployeeRequest $request)
    // {
    //     try {
    //         $validatedData = $request->validated();
    //         $validatedData['password'] = bcrypt($validatedData['password']);
    //         $user = User::create($validatedData);
    //         $response = [
    //             'user' => $user
    //         ];
    //         return $this->sendResponse($response, 'User registered successfully.');
    //     } catch (\Exception $e) {

    //         return $this->sendError('Registration failed.', [$e->getMessage()]);
    //     }
    // }
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

}
