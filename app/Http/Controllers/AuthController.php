<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @param SignInRequest $request
     * @return JsonResponse
     */
    public function signIn(SignInRequest $request): JsonResponse
    {
        $user = User::where('email', $request['email'])->first();

        if ($user && Hash::check($request['password'], $user->password)) {
            return $this->authenticated($user);
        }

        return \response()->json([
            'error' => 'Unauthenticated.'
        ], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * @param SignUpRequest $request
     * @return JsonResponse
     */
    public function signUp(SignUpRequest $request): JsonResponse
    {
        $request['password'] = Hash::make($request['password']);

        $user = User::create($request->all());

        return $this->authenticated($user, Response::HTTP_CREATED);
    }

    /**
     * @param User $user
     * @param int $response
     * @return JsonResponse
     */
    private function authenticated(User $user, int $response = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'user' => $user,
            'token' => $user->createToken('auth')->plainTextToken,
        ], $response);
    }
}
