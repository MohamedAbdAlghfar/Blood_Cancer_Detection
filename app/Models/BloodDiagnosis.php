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
        'user_id',
    ];


    public function User()
    {
     return $this->belongsTo('App\Models\User');
    }
    




}
