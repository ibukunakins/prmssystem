<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'admission_type',
        'admission_time',
        'ward_no',
        'room_no',
        'comment',
        'staff_id',
        'status'
    ];
    
    protected $casts = [
        'admission_time' => 'datetime'
    ];

    public $appends = ['statusCode'];
    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function staff(){
        return $this->belongsTo(Staff::class);
    }

    function getStatusCodeAttribute()
    {
        $code = [
            'discharged' => 'danger',
            'admitted' => 'success',
        ];    

        return $code[$this->status];
    }

}
