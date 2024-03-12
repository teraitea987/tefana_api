<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licence;
use Validator;

class LicenceController extends Controller
{
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'first_name' => 'required|string|max:250',
            'last_name' => 'required|string|max:250',
            'adress' => 'required|string|max:250',
            'phone_number' => 'required|string|max:250',
            'birthday_date' => 'required|date',
            'category_license' => 'required|string|max:250',
            'country' => 'required|string|max:250',
            'created_by' => 'required|integer',
        ]);

        if($validate->fails()){  
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);    
        }

        $licence = Licence::create($request->all());

        $response = [
            'status' => 'success',
            'message' => 'Licence is added successfully.',
            'data' => $licence,
        ];

        return response()->json($response, 200);
    }
}
