<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licence;
use Validator;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Storage;
class LicenceController extends Controller
{
    public function index()
    {
        $licences = Licence::all();
        
        if ($licences->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Licences not found.',
                'data' => null,
            ], 404);
        }
        $response = [
            'status' => 'success',
            'message' => 'Licences retrieved successfully.',
            'data' => $licences,
        ];

        return response()->json($response, 200);
    }

    public function store(Request $request, FileUploadService $fileUploadService)
    {
        $request->merge(['birthday_date' => date('Y-m-d', strtotime($request->birthday_date))]);
        $request->merge(['licence_season_1' => date('Y-m-d', strtotime($request->licence_season_1. "-01-01"))]);
        $validate = Validator::make($request->all(), [
            'first_name' => 'required|string|max:250',
            'last_name' => 'required|string|max:250',
            'adress' => 'required|string|max:250',
            'phone_number' => 'required|string|max:250',
            'birthday_date' => 'required|date',
            'licence_category_1' => 'required|int',
            'country' => 'required|string|max:250',
            'club_name' => 'required|string|max:250',
            'licence_number_1' => 'required|int',
            'licence_season_1' => 'required|date',
        ]);
        if($validate->fails()){  
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);    
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            

            $lid = rand(1000, 9999);
            $file_name = $file->getClientOriginalName();
            $file_ext = $file->getClientOriginalExtension();
            $fileInfo = pathinfo($file_name);
            $filename = $fileInfo['filename'];
            $newname = $filename . $lid . "." . $file_ext;
            $destinationPath = 'images/uploads/';
            $file->move($destinationPath, $newname);
            
            // Use the FileUploadService to upload the file
            $picture_url = $destinationPath.$newname;
            $request->merge(['picture_url' => $picture_url]);

        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Picture is required.',
                'data' => null,
            ], 403);
        }
        
        $request->merge(['created_by' => auth()->user()->id]);
        $licence = Licence::create($request->all());
        dd($licence);
        $response = [
            'status' => 'success',
            'message' => 'Licence is added successfully.',
            'data' => $licence,
        ];

        return response()->json($response, 200);
    }
    
    public function update(Request $request, $id) 
    {
        $licence = Licence::find($id);

        if (is_null($licence)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Licence not found.',
                'data' => null,
            ], 404);
        }

        $licence->update($request->all());

        $response = [
            'status' => 'success',
            'message' => 'Licence updated successfully.',
            'data' => $licence,
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $licence = Licence::find($id);

        if (is_null($licence)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Licence not found.',
                'data' => null,
            ], 404);
        }

        $licence->delete();

        $response = [
            'status' => 'success',
            'message' => 'Licence deleted successfully.',
            'data' => $licence,
        ];

        return response()->json($response, 200);
    }   

    public function show($id)
    {
        $licence = Licence::find($id);

        if (is_null($licence)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Licence not found.',
                'data' => null,
            ], 404);
        }

        $response = [
            'status' => 'success',
            'message' => 'Licence retrieved successfully.',
            'data' => $licence,
        ];

        return response()->json($response, 200);
    }
    
    public function show_pdf($id) {
        $licence = Licence::find($id);
        return view('licences/licence_pdf', ['licence' => $licence]);
    }
}
