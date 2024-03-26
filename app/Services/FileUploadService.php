<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadService
{
  // public function uploadFile($file)
  // {
  //     // Generate a unique name for the file
  //     $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();

  //     // Store the file in the 'public' disk (you can configure other disks as needed)
  //     Storage::disk('public')->putFileAs('images/uploads', $file, $fileName);
  //     // Return the file path for future use (e.g., storing in the database)
  //     return 'images/uploads/' . $fileName;
  // }

  public function uploadFile($file) {

    $lid = rand(1000, 9999);
    $file_name = $file->getClientOriginalName();
    $file_ext = $file->getClientOriginalExtension();
    $fileInfo = pathinfo($file_name);
    $filename = $fileInfo['filename'];
    $newname = $filename . $lid . "." . $file_ext;
    $destinationPath = 'images/uploads/';
    $file->move($destinationPath, $newname);

  }
}