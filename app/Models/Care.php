<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Care extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_care';
    public function record()
    {
        return $this->hasMany(Record::class, 'care_id', 'id_care');
    }
}
