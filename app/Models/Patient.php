<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_patient';
    protected $guarded = [''];
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('id_patient', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')
                ->orWhere('city', 'like', '%' . $search . '%')
                ->orWhere('dateofbirth', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('job', 'like', '%' . $search . '%')
                ->orWhere('phonenumber', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhereHas('gender', function($query) use($search){
                    $query->where('gender', 'like', '%' . $search . '%');
                })
                ->orWhereHas('religion', function($query) use($search){
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('status', function($query) use($search){
                    $query->where('status', 'like', '%' . $search . '%');
                })
                ->orWhereHas('nationality', function($query) use($search){
                    $query->where('nationality', 'like', '%' . $search . '%');
                });
        });
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'id_gender');
    }
    public function religion()
    {
        return $this->belongsTo(Religion::class, 'religion_id', 'id_religion');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id_status');
    }
    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id', 'id_nationality');
    }
    public function record()
    {
        return $this->hasMany(Record::class, 'patient_id', 'id_patient');
    }
}
