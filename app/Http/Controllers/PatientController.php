<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function create()
    {
        return view('create_patient');    
    }

    public function store(Request $request)
    {
        
        $rules = [ 
            'name' => 'required|string|max:255',
            'age' => 'required',
            'address' => 'required|string|max:255',
            'gender' => 'required',
            'phone' => 'required',
        ];

        $this->validate($request, $rules);
        if($request->gender == "male") 
        $gender = 1 ;
        else
        $gender = 0 ;

        $patient = Patient::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'age' => $request->age,
            'gender' => $gender,
        ]);
        
           
        // Get authenticated user
        $user = Auth::user();

        // Attach patient to the user in the pivot table
        $user->Patients()->attach($patient->id);


        return redirect('/dashboard')->withStatus('patient successfully created.');     

        }



     public function viewPatients (Request $request){

            $user = Auth::user();
            
              $search = $request->input('search'); 
        
              $patients = $user->Patients()
              ->when($request->input('search'), function ($query, $search) {
                  $query->where('name', 'like', "%{$search}%");
              })
              ->get();
        
        
            return view('/patients', compact('patients')); 
        
    }



    public function show($id)
    {
        $user = Auth::user();
    
        // Get the patient if related to authenticated user
        $patient = $user->Patients()->where('patient_id', $id)->firstOrFail();
    
        // Load diagnoses (assuming the relationship is diagnoses() in Patient model)
        $diagnoses = $patient->BloodDiagnoses()->latest()->get();
    
        return view('/showPatient', compact('patient', 'diagnoses'));
    }
 



}
