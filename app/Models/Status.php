<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_status';
    public function patient()
    {
        return $this->hasMany(Patient::class, 'status_id', 'id_status');
    }
}
