<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BloodDiagnosis;

class HistoryController extends Controller
{

public function index (){

    $user = Auth::user();
    $history = $user->BloodDiagnoses()->orderBy('created_at', 'desc')->get();

    return view('/history', compact('history'));



}






}
