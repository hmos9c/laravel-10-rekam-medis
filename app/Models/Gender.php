<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_gender';
    public function employee()
    {
        return $this->hasMany(Employee::class, 'gender_id', 'id_gender');
    }
    public function doctor()
    {
        return $this->hasMany(Doctor::class, 'gender_id', 'id_gender');
    }
    public function patient()
    {
        return $this->hasMany(Patient::class, 'gender_id', 'id_gender');
    }
}
