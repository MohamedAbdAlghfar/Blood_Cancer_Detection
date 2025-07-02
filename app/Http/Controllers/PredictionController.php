<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\BloodDiagnosis;

class PredictionController extends Controller
{
    public function predict(Request $request)
    {
        // Validate image input
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->file('photo');

        // Send image to ML API
        $response = Http::withHeaders([
            'ngrok-skip-browser-warning' => 'true'
        ])->attach(
            'file',
            file_get_contents($image->getRealPath()),
            $image->getClientOriginalName()
        )->post('http://127.0.0.1:5000/api/predict');

        $responseData = $response->json();

        // Check if it's a valid blood image
        if (!($responseData['is_blood_image'] ?? false)) {
            return view('result', ['prediction' => $responseData['prediction']]);
        }

        // Save image locally
        $file_to_store = null;
        if ($image) {
            $filename = $image->getClientOriginalName();
            $fileextension = $image->getClientOriginalExtension();
            $file_to_store = time() . '_' . pathinfo($filename, PATHINFO_FILENAME) . '_.'.$fileextension;
            $image->move('images', $file_to_store);
        }

        // Save prediction in DB
        $diagnosis = new BloodDiagnosis();
        $diagnosis->photo = $file_to_store;
        $diagnosis->diagnoses = $responseData['prediction'];
        $diagnosis->patient_id = $request->input('patient_id');
        $diagnosis->save();

        // Show result view
        return view('result', ['prediction' => $responseData['prediction']]);
    }
}
