<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodDiagnosis extends Model
{
    use HasFactory;
    protected $fillable = [
        'diagnoses',
        'photo',
        'patient_id',  
    ];


    public function Patient()
    {
     return $this->belongsTo('App\Models\Patient'); 
    }
    




}
