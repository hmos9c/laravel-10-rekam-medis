<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Record extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_record';
    protected $guarded = [''];
    public function scopeFilter($query, $filters)
    {

        $query->when($filters['dateofentry'] ?? false, function($query, $search){
            return $query->whereDate('dateofentry', '>=', $search);
        });
        $query->when($filters['outdate'] ?? false, function($query, $search){
            return $query->whereDate('outdate', '<=', $search);
        });

        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('id_record', 'like', '%' . $search . '%')
                            ->orWhere('hospital', 'like', '%' . $search . '%')
                                ->orWhereHas('patient', function($query) use($search){
                                    $query->where('id_patient', 'like', '%' . $search . '%')
                                            ->orWhere('name', 'like', '%' . $search . '%')
                                            ->orWhere('phonenumber', 'like', '%' . $search . '%')
                                            ->orWhere('email', 'like', '%' . $search . '%')
                                                ->orWhereHas('gender', function($query) use($search){
                                                    $query->where('gender', 'like', '%' . $search . '%');
                                                });  
                                })
                                ->orWhereHas('doctor', function($query) use($search){
                                    $query->where('id_doctor', 'like', '%' . $search . '%')
                                            ->orWhere('name', 'like', '%' . $search . '%');
                                })
                                ->orWhereHas('bed', function($query) use($search){
                                    $query->where('id_bed', 'like', '%' . $search . '%')
                                            ->orWhere('room', 'like', '%' . $search . '%');
                                });
        });
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id_patient');
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id_doctor');
    }
    public function drug()
    {
        return $this->belongsTo(Drug::class, 'drug_id', 'id_drug');
    }
    public function bed()
    {
        return $this->belongsTo(Bed::class, 'bed_id', 'id_bed');
    }
    public function care()
    {
        return $this->belongsTo(Care::class, 'care_id', 'id_care');
    }
}
