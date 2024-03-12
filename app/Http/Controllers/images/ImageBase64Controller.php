<?php

namespace App\Http\Controllers\images;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageBase64Controller extends Controller
{
    public function handleImage(Request $request)
    {

        $base64Image = $request->input('photo');
        $binaryImage = base64_decode($base64Image);

        dd($request->all(), $binaryImage);
        // Generate a unique filename or use the original filename
        $filename = uniqid() . '.jpg';

        // Store the image in the public folder
        Storage::disk('public')->put($filename, $binaryImage);

        // Get the public URL of the stored image
        $publicUrl = asset('storage/' . $filename);

        return response()->json(['message' => 'Image saved successfully', 'file_path' => $publicUrl]);
    }
}
