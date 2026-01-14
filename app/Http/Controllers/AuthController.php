<?php
namespace App\Http\Controllers;

use App\Helpers\ApiHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return ApiHelper::sendResponse(
                false,
                'Invalid credentials',
                null,
                401
            );
        }

        $token = $user->createToken('auth-token')->plainTextToken;

        return ApiHelper::sendResponse(
            true,
            'User login successfully',
            ['token' => $token]
        );
    }
}
