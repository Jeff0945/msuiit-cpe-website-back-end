<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @param SignInRequest $request
     * @return JsonResponse
     */
    public function signIn(SignInRequest $request): JsonResponse
    {
        $attempt = Auth::attempt($request->all());

        if ($attempt) {
            $user = Auth::user();

            if ($user) {
                return $this->responseData($user);
            }

            return $this->unauthenticated();
        }

        return $this->unauthenticated();
    }

    /**
     * @param SignUpRequest $request
     * @return JsonResponse
     */
    public function signUp(SignUpRequest $request): JsonResponse
    {
        $user = User::create($request->all());
        $attempt = Auth::attempt($user->toArray());

        if ($attempt) {
            $user = Auth::user();

            if ($user) {
                return $this->responseData($user);
            }

            return $this->unauthenticated();
        }

        return response()->json([
            'error' => 'Account creation failed.'
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    private function responseData(User $user): JsonResponse
    {
        return response()->json([
            'fullName' => $user->full_name ?? '',
            'token' => $user->createToken('auth')->plainTextToken,
        ]);
    }

    /**
     * @return JsonResponse
     */
    private function unauthenticated(): JsonResponse
    {
        return \response()->json([
            'error' => 'Unauthenticated.'
        ], Response::HTTP_UNAUTHORIZED);
    }
}
