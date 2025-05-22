<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'gender', 
        'age',
        'address',
    ];

    public function BloodDiagnoses()
    { 
        return $this->hasMany('App\Models\BloodDiagnosis'); 
    } 

    public function Users() {
        return $this->belongsToMany('App\Models\User');
    }





}
