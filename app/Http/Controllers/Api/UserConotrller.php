<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserConotrller extends Controller
{
    public function index()
    {
        try {
            $userLogged = Auth::user();
            $users = User::where('id','<>',$userLogged->id)->get();
            return response()->json([
                'users' => $users
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Erro no chat'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function show(User $user)
    {
        return response(['user' => $user],200);
    }
}
