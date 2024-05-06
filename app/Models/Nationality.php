<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_nationality';
    public function patient()
    {
        return $this->hasMany(Patient::class, 'nationality_id', 'id_nationality');
    }
}
