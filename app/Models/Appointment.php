<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'title', 'date_time', 'staff_id', 'service_id', 'comment'];

    protected $casts = [
        'date_time' => 'datetime'
    ];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function staff(){
        return $this->belongsTo(Staff::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

}
