<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_religion';
    public function patient()
    {
        return $this->hasMany(Patient::class, 'religion_id', 'id_religion');
    }
}
