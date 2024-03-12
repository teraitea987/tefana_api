<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Validator;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function all()
    {
        $users = User::latest()->get();
        
        if (is_null($users->first())) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No user found!',
            ], 200);
        }

        $response = [
            'status' => 'success',
            'message' => 'Users are retrieved successfully.',
            'data' => $users,
        ];

        return response()->json($response, 200);
    }
}
