<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;
    protected $guarded = [''];
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('id', 'like', '%' . $search . '%')
            ->orWhere('building', 'like', '%' . $search . '%')
            ->orWhere('room', 'like', '%' . $search . '%');
        });
    }
    // public function room()
    // {
    //     return $this->belongsTo(Room::class);
    // }
    // public function record()
    // {
    //     return $this->hasMany(Record::class);
    // }

}
