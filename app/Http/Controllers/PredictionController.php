<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\BloodDiagnosis;
use Illuminate\Support\Facades\Auth;

class PredictionController extends Controller
{
    public function predict(Request $request)
    {
        // Validate the image upload
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Get the uploaded file
        $image = $request->file('photo');

        // Send the image to the ML model in Google Colab
        $response = Http::withHeaders([
            'ngrok-skip-browser-warning' => 'true'
        ])->attach(
            'file', // This must match the key expected by the Flask API ('file')
            file_get_contents($image->getRealPath()),
            $image->getClientOriginalName()
        )->post('http://127.0.0.1:5000/api/predict');

        // Decode the response
        $prediction = $response->json();
        $prediction = $prediction['prediction'];

       //save image in project
       if($file = $request->file('photo')) {

        $filename = $file->getClientOriginalName();
        $fileextension = $file->getClientOriginalExtension();
        $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

        if($file->move('images', $file_to_store)) {
                $photo = $file_to_store ;
        }
    }



       // Save the image path and prediction result to the database
       $diagnosis = new BloodDiagnosis();
       $diagnosis->photo = $photo;  // Store image path
       $diagnosis->diagnoses = $prediction; // Store ML result
       $diagnosis->user_id = Auth::user()->id; // store user_id 
       $diagnosis->save();



           return view('result',compact('prediction'));
        // Return prediction result as JSON 
       // return response()->json($prediction);
    }
}
