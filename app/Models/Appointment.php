<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['title','description', 'patient_id', 'organization_id', 'practitioner_id'];

    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }

    public function organization(){
        return $this->belongsTo(Organization::class, 'patient_id', 'id');
    }

    public function practitioner(){
        return $this->belongsTo(Practitioner::class, 'patient_id', 'id');
    }
}
